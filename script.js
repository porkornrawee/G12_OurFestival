document.addEventListener('DOMContentLoaded', () => {
    // ตรวจสอบ URL Parameter ว่ามี status=success หรือไม่
    const urlParams = new URLSearchParams(window.location.search);
    
    if (urlParams.get('status') === 'success') {
        // ถ้ามี ให้แสดง Alert (ถ้ามี element id="successMessage")
        const message = document.getElementById("successMessage");
        if (message) {
            message.style.display = "block";
            // ลบ parameter ออกจาก URL เพื่อไม่ให้ refresh แล้วขึ้นซ้ำ (Optional)
            window.history.replaceState({}, document.title, window.location.pathname);
            
            // เพิ่ม: สั่งให้ Redirect กลับไปหน้า Home หลังจากแสดงข้อความสำเร็จ 3 วินาที (ถ้าต้องการ)
            setTimeout(() => window.location.href = "Homepage.html", 3000);
        } else {
            alert("บันทึกข้อมูลสำเร็จ! ขอบคุณที่ร่วมกิจกรรม 🎃");
        }
    }
});