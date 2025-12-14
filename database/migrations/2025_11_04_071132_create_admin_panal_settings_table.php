<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('admin_panal_settings', function (Blueprint $table) {
            $table->id();
            $table->string('company_name', 250);
            $table->string('image', 225);
            $table->string('phone', 225);
            $table->string('email', 100);
            $table->string('address', 250);
            $table->integer('com_code');
            $table->integer('added_by');
            $table->integer('updated_by')->nullable();
            $table->tinyInteger('system_status')->default('1')->comment('واحد مفعل -صفر غير مفعل');

            $table->decimal('after_minute_calculate_delay',10,2)->default('0')->comment('بعد كم دقيقة نحسب تأخير الحضور');

            $table->decimal('after_minute_calculate_early_departure',10,2)->default('0')->comment('بعد كم دقيقة نحسب الانصراف المبكر');

            $table->decimal('after_minute_quarterday',10,2)->default('0')->comment('بعد كم دقيقة مجموع الانصراف المبكر أو الحضور المتأخر نخصم ربع يوم');

            $table->decimal('after_time_half_daycut',10,2)->default('0')->comment('بعد كم مرة انصراف المبكر أو تأخير نخصم نصف يوم');

            $table->decimal('after_time_allday_daycut',10,2)->default('0')->comment('بعد كم مرة انصراف المبكر أو تأخير نخصم يوم كامل');

            $table->decimal('monthly_vacation_balance',10,2)->default('0')->comment('رصيد أجازات الموظف الشهري');

            $table->decimal('after_days_begin_vacation',10,2)->default('0')->comment('بعد كم يوم ينزل للموظف رصيد أجازات');

            $table->decimal('first_balance_begin_vacation',10,2)->default('0')->comment('الرصيد الاولي المرحل عند تفعيل الإجازات للموظف مثل نزول عشرة أيام و نصف بعد ستة شهور للموظف');

$table->decimal('sanctions_value_first_absence',10,2)->default('0')->comment('قيمة خصم الأيام بعد أول مرة غياب بدون إذن');
$table->decimal('sanctions_value_second_absence',10,2)->default('0')->comment('قيمة خصم الأيام بعد ثاني مرة غياب بدون إذن');
$table->decimal('sanctions_value_third_absence',10,2)->default('0')->comment('قيمة خصم الأيام بعد ثالث مرة غياب بدون إذن');
$table->decimal('sanctions_value_forth_absence',10,2)->default('0')->comment('قيمة خصم الأيام بعد رابع مرة غياب بدون إذن');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_panal_settings');
    }
};