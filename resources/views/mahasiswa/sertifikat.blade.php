<!DOCTYPE html>
<html>
<head>
    <title>Sertifikat Magang</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Open+Sans:wght@300;400;600&display=swap');
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Open Sans', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .print-btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 50px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            margin-bottom: 30px;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .print-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
        }
        
        .sertifikat {
            background: #fff;
            width: 210mm;
            max-width: 95vw;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.2);
            position: relative;
            overflow: hidden;
            border: 6px solid transparent;
            background-clip: padding-box;
        }
        
        .sertifikat::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, #667eea, #764ba2, #f093fb, #f5576c);
            z-index: -1;
            margin: -8px;
            border-radius: 30px;
        }
        
        .certificate-border {
            border: 2px solid #2c3e50;
            border-radius: 15px;
            padding: 30px;
            position: relative;
            background: linear-gradient(45deg, #f8f9fa 0%, #ffffff 50%, #f8f9fa 100%);
        }
        
        .ornament {
            position: absolute;
            width: 40px;
            height: 40px;
            background: linear-gradient(45deg, #667eea, #764ba2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 16px;
            font-weight: bold;
        }
        
        .ornament.top-left {
            top: -20px;
            left: -20px;
        }
        
        .ornament.top-right {
            top: -20px;
            right: -20px;
        }
        
        .ornament.bottom-left {
            bottom: -20px;
            left: -20px;
        }
        
        .ornament.bottom-right {
            bottom: -20px;
            right: -20px;
        }
        
        .header {
            text-align: center;
            margin-bottom: 25px;
        }
        
        .company-logo {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            border-radius: 50%;
            margin: 0 auto 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 28px;
            font-weight: bold;
        }
        
        .certificate-title {
            font-family: 'Playfair Display', serif;
            font-size: 2.5rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 8px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
            letter-spacing: 2px;
        }
        
        .subtitle {
            font-size: 1rem;
            color: #7f8c8d;
            font-weight: 300;
            margin-bottom: 20px;
            font-style: italic;
        }
        
        .content {
            text-align: center;
            margin: 30px 0;
        }
        
        .presented-to {
            font-size: 1.1rem;
            color: #34495e;
            margin-bottom: 15px;
            font-weight: 300;
        }
        
        .recipient-name {
            font-family: 'Playfair Display', serif;
            font-size: 2.2rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 12px;
            padding: 15px 0;
            border-bottom: 2px solid #667eea;
            border-top: 2px solid #667eea;
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.1), rgba(118, 75, 162, 0.1));
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
        }
        
        .nim {
            font-size: 1rem;
            color: #7f8c8d;
            font-weight: 600;
            margin-bottom: 20px;
            font-family: 'Courier New', monospace;
        }
        
        .achievement {
            font-size: 1.1rem;
            color: #34495e;
            line-height: 1.6;
            margin: 20px 0;
            padding: 15px;
            background: rgba(255, 255, 255, 0.7);
            border-radius: 10px;
            border-left: 4px solid #667eea;
        }
        
        .footer {
            margin-top: 40px;
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
        }
        
        .date-section {
            text-align: left;
            flex: 1;
        }
        
        .signature-section {
            text-align: right;
            flex: 1;
        }
        
        .date-label {
            font-size: 0.9rem;
            color: #7f8c8d;
            margin-bottom: 5px;
        }
        
        .date-value {
            font-size: 1.1rem;
            color: #2c3e50;
            font-weight: 600;
        }
        
        .signature-space {
            height: 60px;
            border-bottom: 2px solid #2c3e50;
            width: 150px;
            margin: 15px 0 8px auto;
        }
        
        .signature-name {
            font-size: 1.1rem;
            color: #2c3e50;
            font-weight: 700;
            margin-bottom: 3px;
        }
        
        .signature-title {
            font-size: 0.9rem;
            color: #7f8c8d;
            font-style: italic;
        }
        
        .decorative-line {
            height: 2px;
            background: linear-gradient(90deg, transparent, #667eea, #764ba2, transparent);
            margin: 20px 0;
        }
        
        @media print {
            .no-print {
                display: none;
            }
            
            body {
                background: white;
                min-height: auto;
                padding: 0;
                margin: 0;
            }
            
            .sertifikat {
                box-shadow: none;
                max-width: 100%;
                margin: 0;
                width: 210mm;
                min-height: 297mm;
                padding: 20mm;
                border-radius: 0;
                border: none;
                background: white;
                page-break-inside: avoid;
            }
            
            .print-btn {
                display: none;
            }
            
            .certificate-border {
                border: 2px solid #2c3e50;
                border-radius: 15px;
                padding: 20mm;
                background: white;
            }
        }
        
        @media (max-width: 768px) {
            .sertifikat {
                padding: 30px;
                width: 100%;
            }
            
            .certificate-border {
                padding: 20px;
            }
            
            .certificate-title {
                font-size: 2.5rem;
            }
            
            .recipient-name {
                font-size: 2rem;
            }
            
            .footer {
                flex-direction: column;
                text-align: center;
                gap: 30px;
            }
            
            .signature-space {
                margin: 20px auto;
            }
        }
    </style>
</head>
<body>
    <button class="print-btn no-print" onclick="window.print()">🖨️ Print Certificate</button>
    
    <div class="sertifikat">
        <div class="certificate-border">
            <div class="ornament top-left">✦</div>
            <div class="ornament top-right">✦</div>
            <div class="ornament bottom-left">✦</div>
            <div class="ornament bottom-right">✦</div>
            
            <div class="header">
                <div class="company-logo">⚡</div>
                <h1 class="certificate-title">CERTIFICATE</h1>
                <div class="subtitle">of Internship Completion</div>
            </div>
            
            <div class="decorative-line"></div>
            
            <div class="content">
                <div class="presented-to">This is to certify that</div>
                
                <div class="recipient-name">{{ $mahasiswa->nama }}</div>
                
                <div class="nim">Student ID: {{ $mahasiswa->nim }}</div>
                
                <div class="achievement">
                    has successfully completed the internship program at<br>
                    <strong>PT PLN Nusantara Power Unit Pembangkit Belawan</strong><br>
                    and has demonstrated excellent performance and dedication throughout the program.
                </div>
            </div>
            
            <div class="decorative-line"></div>
            
            <div class="footer">
                <div class="date-section">
                    <div class="date-label">Date of Completion</div>
                    <div class="date-value">{{ \Carbon\Carbon::parse($mahasiswa->selesai_magang)->format('d M Y') }}</div>
                </div>
                
                <div class="signature-section">
                    <div class="signature-space"></div>
                    <div class="signature-name">Admin</div>
                    <div class="signature-title">Program Coordinator</div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>