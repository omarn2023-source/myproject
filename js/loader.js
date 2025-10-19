var ctx = document.getElementById('circularLoader').getContext('2d');
var al = 0;
var start = 4.72; // بداية القوس
var cw = ctx.canvas.width;
var ch = ctx.canvas.height; 
var diff;
var sim;

function progressSim() {
    // حساب التقدم في الدائرة
    diff = ((al / 100) * Math.PI * 2); // التقدم في الدائرة
    ctx.clearRect(0, 0, cw, ch);  // مسح الدائرة القديمة
    ctx.lineWidth = 17;
    ctx.fillStyle = '#0d6efd';
    ctx.strokeStyle = "#0d6efd";
    ctx.textAlign = "center";
    ctx.font = "28px monospace";
    ctx.fillText(al + '%', cw * 0.52, ch * 0.5 + 5, cw + 12);  // عرض النسبة المئوية في منتصف الدائرة
    ctx.beginPath();
    ctx.arc(100, 100, 75, start, diff + start, false);
    ctx.stroke();

    // عندما يصل التقدم إلى 100% 
    if (al >= 100) {
        clearTimeout(sim);  // إيقاف المحاكاة
        myModal.show();  // عرض المودال (اسم الفائز)
        loader.style.display = 'none';  // إخفاء اللودر

        // تشغيل تأثير الاحتفالات بعد 500 ملي ثانية
        setTimeout(function() {
            // تشغيل تأثير confetti
            confetti({
                particleCount: 200,  // عدد الجسيمات
                spread: 70,          // مدى الانتشار
                origin: { x: 0.5, y: 0.5 }  // نقطة انطلاق الاحتفالات
            });
        }, 500);  // تأخير 500 ملي ثانية قبل تشغيل الاحتفالات
    }
    al++;  // زيادة التقدم
}

const win = document.querySelector("#winner");
const loader = document.querySelector(".loader-con");  // التأكد من استخدام الفئة بشكل صحيح

var myModal = new bootstrap.Modal(document.getElementById('Modal'), {
    keyboard: false
});

win.addEventListener('click', function() {
    loader.style.display = 'block';  // إظهار اللودر عند الضغط على الزر
    sim = setInterval(progressSim, 80);  // بدء المحاكاة كل 80 ملي ثانية
});
