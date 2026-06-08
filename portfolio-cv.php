<?php
// portfolio-cv.php

// تحديد مسار ملف الـ PDF الفعلي المخزن على السيرفر
$pdf_file_path = "assets/docs/Marwah_Abdullah_Sabei_CV.pdf"; 

// معالجة طلب تحميل الملف (Download Action) عبر الـ Backend
if (isset($_GET['action']) && $_GET['action'] == 'download') {
    if (file_exists($pdf_file_path)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="Marwah_Abdullah_Sabei_CV.pdf"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($pdf_file_path));
        flush(); 
        readfile($pdf_file_path);
        exit;
    } else {
        echo "<script>alert('Sorry, the PDF file is temporarily unavailable.');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marwah Abdullah Sabei - Interactive Portfolio CV</title>
    <style>
        body {
            font-family: 'Segoe UI', Roboto, Arial, sans-serif;
            background-color: #111827;
            color: #f3f4f6;
            margin: 0;
            padding: 20px;
        }
        .browser-mockup {
            border: 1px solid #374151;
            background-color: #1f2937;
            border-radius: 8px;
            overflow: hidden;
            max-width: 1000px;
            margin: 0 auto;
            box-shadow: 0 10px 30px rgba(0,0,0,0.5);
        }
        .browser-header {
            background-color: #111827;
            padding: 12px;
            border-bottom: 1px solid #374151;
            display: flex;
            align-items: center;
        }
        .circle {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            display: inline-block;
            margin-right: 6px;
        }
        .c-red { background-color: #ef4444; }
        .c-yellow { background-color: #f59e0b; }
        .c-green { background-color: #10b981; }
        .browser-address {
            background-color: #1f2937;
            color: #9ca3af;
            font-size: 11px;
            padding: 4px 15px;
            border-radius: 4px;
            width: 50%;
            margin-left: 20px;
            border: 1px solid #374151;
        }
        .app-header {
            background-color: #111827;
            padding: 20px;
            border-bottom: 1px solid #374151;
            text-align: center;
        }
        .app-title {
            color: #38bdf8;
            margin: 0 0 5px 0;
            font-size: 22px;
            font-weight: bold;
        }
        .action-bar {
            background-color: #1f2937;
            padding: 15px;
            border-bottom: 1px solid #374151;
            text-align: center;
        }
        .btn {
            display: inline-block;
            padding: 8px 24px;
            font-weight: 600;
            border-radius: 6px;
            text-decoration: none;
            margin: 0 10px;
            font-size: 14px;
            transition: all 0.3s ease;
        }
        .btn-primary {
            background-color: #0284c7;
            color: #fff;
        }
        .btn-primary:hover { background-color: #0369a1; }
        .btn-secondary {
            background-color: #374151;
            color: #e5e7eb;
            border: 1px solid #4b5563;
        }
        .btn-secondary:hover { background-color: #4b5563; }
        .preview-container {
            padding: 30px;
            background-color: #111827;
        }
        .cv-frame {
            background-color: #1f2937;
            border: 1px solid #374151;
            border-radius: 6px;
            padding: 30px;
        }
        .cv-name { color: #ffffff; margin: 0; font-size: 28px; font-weight: bold; }
        .cv-role { color: #38bdf8; font-size: 16px; font-weight: bold; margin: 5px 0 15px 0; letter-spacing: 1px; }
        .cv-meta { color: #9ca3af; font-size: 13px; margin-bottom: 20px; border-bottom: 2px solid #38bdf8; padding-bottom: 15px; }
        .cv-meta span { margin-right: 20px; }
        .cv-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 30px;
        }
        .section-title {
            color: #38bdf8;
            border-left: 4px solid #0284c7;
            padding-left: 10px;
            font-size: 16px;
            text-transform: uppercase;
            margin-top: 0;
            margin-bottom: 15px;
            font-weight: bold;
        }
        .item-block { margin-bottom: 20px; }
        .item-title { font-weight: bold; color: #fff; font-size: 15px; }
        .item-sub { color: #9ca3af; font-size: 13px; font-style: italic; margin-bottom: 5px; }
        ul { padding-left: 20px; color: #d1d5db; font-size: 13.5px; margin-top: 5px; }
        li { margin-bottom: 6px; line-height: 1.5; }
        .pill {
            display: inline-block;
            background-color: #374151;
            color: #e5e7eb;
            padding: 4px 10px;
            border-radius: 4px;
            font-size: 12px;
            margin: 0 5px 5px 0;
            border: 1px solid #4b5563;
        }
        .award-card {
            background-color: rgba(3, 105, 161, 0.2);
            border-left: 3px solid #38bdf8;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 0 4px 4px 0;
        }
        @media (max-width: 768px) {
            .cv-grid { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>

<div class="browser-mockup">
    <div class="browser-header">
        <div class="circle c-red"></div>
        <div class="circle c-yellow"></div>
        <div class="circle c-green"></div>
        <div class="browser-address">https://marwah-sabei.dev/portfolio-cv</div>
    </div>
    
    <div class="app-header">
        <h1 class="app-title">Interactive AI Resume Portal</h1>
    </div>
    
    <div class="action-bar">
        <a href="<?php echo $pdf_file_path; ?>" target="_blank" class="btn btn-primary">View Live CV</a>
        <a href="portfolio-cv.php?action=download" class="btn btn-secondary">Download PDF</a>
    </div>
    
    <div class="preview-container">
        <div class="cv-frame">
            [cite_start]<h2 class="cv-name">Marwah Abdullah Sabei</h2> [cite: 1]
            [cite_start]<div class="cv-role">Web Developer & AI Integrator</div> [cite: 2, 37]
            <div class="cv-meta">
                [cite_start]<span><strong>Email:</strong> marwaabdullah.2006@gmail.com</span> [cite: 3]
                [cite_start]<span><strong>Phone:</strong> 0560226557</span> [cite: 4]
                [cite_start]<span><strong>Location:</strong> Riyadh, Saudi Arabia</span> [cite: 5]
            </div>
            
            <div class="cv-grid">
                <div class="left-col">
                    <div class="item-block">
                        <h3 class="section-title">Profile</h3>
                        <p style="color: #d1d5db; font-size: 14px; line-height: 1.6; margin: 0;">
                            [cite_start]A highly motivated Web Programming and Development diploma student with a strong academic background in software development and a passion for Artificial Intelligence, Computer Vision, and Robotics. [cite: 9]
                        </p>
                    </div>
                    
                    <div class="item-block">
                        <h3 class="section-title">Key Projects</h3>
                        [cite_start]<div class="item-title">MS SmartScan — Intelligent Image Analysis System</div> [cite: 37, 68]
                        <div class="item-sub">Lead Developer & AI Integrator | [cite_start]2026</div> [cite: 37, 68]
                        <ul>
                            [cite_start]<li>Designed and developed an end-to-end intelligent image analysis system utilizing the YOLO11m computer vision model. [cite: 38, 68]</li>
                            [cite_start]<li>Built a dynamic web interface connected to a back-end server via PHP and SQL to display real-time analysis results. [cite: 40]</li>
                            [cite_start]<li>Successfully integrated a hardware-based camera system with a Raspberry Pi 5 single-board computer for live scanning. [cite: 41]</li>
                        </ul>
                    </div>

                    <div class="item-block">
                        <h3 class="section-title">Experience</h3>
                        [cite_start]<div class="item-title">AI & Robotics Teaching Assistant (Intern)</div> [cite: 46]
                        [cite_start]<div class="item-sub">AI Arena / Anisa Bint Uday School — August 2025</div> [cite: 46]
                        <ul>
                            [cite_start]<li>Mentored and guided middle school students in robotics fundamentals and AI concepts to prepare them for the WRO. [cite: 47]</li>
                        </ul>
                    </div>
                </div>
                
                <div class="right-col">
                    <h3 class="section-title">Skills</h3>
                    <div style="margin-bottom: 15px;">
                        [cite_start]<span class="pill">Python</span><span class="pill">PHP</span> [cite: 74]
                        [cite_start]<span class="pill">JavaScript</span><span class="pill">SQL</span> [cite: 74, 82]
                        [cite_start]<span class="pill">YOLO11</span><span class="pill">Computer Vision</span> [cite: 90]
                        [cite_start]<span class="pill">Raspberry Pi 5</span> [cite: 90]
                    </div>
                    
                    <h3 class="section-title">Honors & Awards</h3>
                    <div class="award-card">
                        [cite_start]<div style="font-weight:bold; color:#38bdf8; font-size:13px;">3rd Place - Speed Challenge</div> [cite: 62]
                        <div style="color:#e5e7eb; font-size:12px;">RoboRAVE International Robotics Competition | [cite_start]May 2026</div> [cite: 62]
                    </div>
                    <div class="award-card">
                        [cite_start]<div style="font-weight:bold; color:#38bdf8; font-size:13px;">The Build Award</div> [cite: 60]
                        <div style="color:#e5e7eb; font-size:12px;">National VEX Robotics Competition | [cite_start]February 2026</div> [cite: 60]
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>