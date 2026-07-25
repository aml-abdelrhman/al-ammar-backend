<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use App\Models\CharityInitiative;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    // 1. استقبال طلب التبرع وتجهيز رابط المحاكاة
    public function store(Request $request)
    {
        $request->validate([
            'initiative_id' => 'required|exists:charity_initiatives,id',
            'amount' => 'required|numeric|min:1',
        ]);

        $initiative = CharityInitiative::findOrFail($request->initiative_id);

        // أ. تسجيل التبرع كمعلق في قاعدة البيانات
        $donation = Donation::create([
            'charity_initiative_id' => $initiative->id,
            'amount' => $request->amount,
            'status' => 'pending',
        ]);

        // ب. توليد رابط محاكاة بوابة الدفع (يقوم بتوجيه المستخدم لصفحة النجاح الوهمية التابعة للباك إند)
        $paymentUrl = route('payment.simulate.success', ['id' => $donation->id]);

        return response()->json([
            'success'     => true,
            'message'     => 'تم إنشاء عملية التبرع بنجاح',
            'donation_id' => $donation->id,
            'payment_url' => $paymentUrl, 
        ]);
    }

    // 2. محاكاة بوابة الدفع الناجحة (تحديث الداتا بيز والمبادرة ثم العودة للواجهة)
    public function simulateSuccess($id)
    {
        $donation = Donation::findOrFail($id);

        if ($donation->status === 'pending') {
            // أ. تحديث حالة التبرع إلى مدفوع
            $donation->update([
                'status' => 'paid',
                'payment_id' => 'MOCK-TXN-' . time(),
            ]);

            // ب. تحديث جدول المبادرات الخيرية (خصم المبلغ وتحديث النسبة)
            $initiative = $donation->initiative;
            
            $target = floatval($initiative->target);
            $remaining = floatval($initiative->remaining);
            $donatedAmount = floatval($donation->amount);

            $newRemaining = max(0, $remaining - $donatedAmount);
            $collectedSoFar = $target - $newRemaining;
            $newProgress = $target > 0 ? min(100, round(($collectedSoFar / $target) * 100)) : 100;

            $initiative->update([
                'remaining' => $newRemaining,
                'progress'  => $newProgress,
            ]);
        }

        // ج. إعادة توجيه المستخدم إلى صفحة الموقع الأمامي مع رسالة نجاح
// ج. إعادة توجيه المستخدم إلى الموقع الأمامي ديناميكياً (Vercel أو Localhost)
        $frontendUrl = env('APP_FRONTEND_URL', 'http://localhost:3000');

        return redirect()->to("{$frontendUrl}/?status=success&amount=" . $donation->amount);    }
}