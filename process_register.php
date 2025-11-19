<?php
// process_register.php

// ตั้งค่า Timezone
date_default_timezone_set('Asia/Bangkok');

// ตรวจสอบว่ามีการส่งข้อมูลมาแบบ POST หรือไม่
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // 1. รับค่าจากฟอร์ม
    $newData = [
        'name'      => htmlspecialchars($_POST['name'] ?? ''),
        'email'     => htmlspecialchars($_POST['email'] ?? ''),
        'phone'     => htmlspecialchars($_POST['phone'] ?? ''),
        'ticket'    => htmlspecialchars($_POST['ticket'] ?? ''),
        'timestamp' => date('Y-m-d H:i:s')
    ];

    // กำหนด Path ของไฟล์
    $directory = 'data';
    $file = $directory . '/registrations.json';

    // 2. ตรวจสอบว่ามีโฟลเดอร์ data หรือไม่ ถ้าไม่มีให้สร้างใหม่
    if (!file_exists($directory)) {
        mkdir($directory, 0777, true);
    }

    // 3. โหลดข้อมูลเก่า
    $currentData = [];
    if (file_exists($file)) {
        $jsonContent = file_get_contents($file);
        $decodedData = json_decode($jsonContent, true);
        
        // ตรวจสอบว่าค่าที่อ่านมาเป็น Array หรือไม่ (กันไฟล์เสียหรือว่างเปล่า)
        if (is_array($decodedData)) {
            $currentData = $decodedData;
        }
    }

    // 4. เพิ่มข้อมูลใหม่ต่อท้าย
    $currentData[] = $newData;

    // 5. แปลงเป็น JSON String
    // หมายเหตุ: แยก json_encode ออกมาก่อน เพื่อความชัดเจน
    $jsonString = json_encode($currentData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

    // 6. บันทึกไฟล์
    // แก้ไข: ย้าย LOCK_EX มาเป็น parameter ตัวที่ 3 ของ file_put_contents
    if(file_put_contents($file, $jsonString, LOCK_EX)) {
        // บันทึกสำเร็จ -> กลับไปหน้า register พร้อมสถานะ success
        header("Location: register.html?status=success");
        exit();
    } else {
        echo "Error: ไม่สามารถบันทึกไฟล์ได้ กรุณาตรวจสอบ Permission ของโฟลเดอร์ data";
    }
    }
?>