<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedbacks | Hall-o'-ween Party</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <nav class="navbar navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">🎃 Hall-o'-ween</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="Homepage.html">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="Boothdirectorypage.html">Booths</a></li>
                    <li class="nav-item"><a class="nav-link" href="feedback.html">Feedback</a></li>

                    <li class="nav-item ms-lg-2 border-start border-secondary d-none d-lg-block"></li>
                    <li class="nav-item"><a class="nav-link text-warning" href="view_registrations.php">View Users</a>
                    </li>
                    <li class="nav-item"><a class="nav-link text-warning" href="view_feedbacks.php">View Feedbacks</a>
                    </li>
                    <li class="nav-item ms-lg-3 mt-2 mt-lg-0">
                        <a class="btn btn-outline-danger btn-sm rounded-pill px-3" href="index.html">
                            Exit 🚪
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>

    <div class="container mt-5 pt-5">
        <h2 class="text-warning text-center mb-4">ความคิดเห็นจากผู้ร่วมงาน</h2>

        <div class="row g-4">
            <?php
            $file = 'data/feedbacks.json';
            $data = []; // กำหนดค่าเริ่มต้นเป็น array ว่าง
            
            // 1. ถ้ามีไฟล์ ให้ลองอ่านข้อมูลมาเก็บในตัวแปร
            if (file_exists($file)) {
                $decodedData = json_decode(file_get_contents($file), true);
                if (is_array($decodedData)) {
                    $data = $decodedData;
                }
            }

            // 2. ตรวจสอบว่ามีข้อมูลจริงหรือไม่ (ครอบคลุมทั้งกรณี "ไม่มีไฟล์" และ "ไฟล์มีแต่ข้อมูลว่าง")
            if (!empty($data)) {
                $data = array_reverse($data); // เอาอันใหม่สุดขึ้นก่อน
            
                foreach ($data as $row) {
                    // ป้องกัน error กรณีไม่มี key เหล่านี้ใน json
                    $rating = isset($row['rating']) ? (int) $row['rating'] : 0;
                    $timestamp = isset($row['timestamp']) ? $row['timestamp'] : '';
                    $message = isset($row['message']) ? htmlspecialchars($row['message']) : ''; // เพิ่ม htmlspecialchars เพื่อความปลอดภัย
            
                    $stars = str_repeat("⭐", $rating);

                    echo '<div class="col-md-6 col-lg-4">';
                    echo '  <div class="card custom-card p-3 h-100">';
                    echo '      <div class="d-flex justify-content-between mb-2">';
                    echo '          <span class="text-warning fs-5">' . $stars . '</span>';
                    echo '          <small class="text-white-50">' . $timestamp . '</small>';
                    echo '      </div>';
                    echo '      <p class="text-white">"' . $message . '"</p>';
                    echo '  </div>';
                    echo '</div>';
                }
            } else {
                // 3. ทำงานเมื่อไม่มีไฟล์ หรือ มีไฟล์แต่ไม่มีข้อมูล
                echo '<div class="col-12">';
                echo '  <p class="text-center text-white">ยังไม่มีความคิดเห็น</p>';
                echo '</div>';
            }
            ?>
        </div>
    </div>
</body>

</html>