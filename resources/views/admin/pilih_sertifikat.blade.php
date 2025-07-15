<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Sertifikat</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            padding: 40px;
            width: 100%;
            max-width: 600px;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .header h1 {
            color: #2c3e50;
            font-size: 2.2rem;
            margin-bottom: 10px;
            font-weight: 700;
        }

        .header p {
            color: #7f8c8d;
            font-size: 1.1rem;
            margin-bottom: 20px;
        }

        .divider {
            height: 3px;
            background: linear-gradient(90deg, #667eea, #764ba2);
            border-radius: 2px;
            margin: 20px 0;
        }

        .student-list {
            margin-bottom: 30px;
        }

        .student-item {
            background: #f8f9fa;
            border: 2px solid transparent;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 15px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .student-item:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            border-color: #667eea;
        }

        .student-item.sent {
            background: linear-gradient(135deg, #d4edda 0%, #c3e6cb 100%);
            border-color: #28a745;
        }

        .student-item.sent::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, transparent 30%, rgba(255, 255, 255, 0.1) 50%, transparent 70%);
            animation: shimmer 2s infinite;
        }

        @keyframes shimmer {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(100%); }
        }

        .student-checkbox {
            display: flex;
            align-items: center;
            cursor: pointer;
            position: relative;
        }

        .student-checkbox input[type="checkbox"] {
            width: 20px;
            height: 20px;
            margin-right: 15px;
            cursor: pointer;
            accent-color: #667eea;
        }

        .student-info {
            flex: 1;
        }

        .student-name {
            font-size: 1.1rem;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 5px;
        }

        .student-nim {
            font-size: 0.9rem;
            color: #7f8c8d;
            font-family: 'Courier New', monospace;
        }

        .status-badge {
            margin-left: auto;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .status-sent {
            background: #28a745;
            color: white;
        }

        .status-pending {
            background: #ffc107;
            color: #212529;
        }

        .submit-section {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid #e9ecef;
        }

        .btn-submit {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 15px 40px;
            border-radius: 50px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .btn-submit:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
        }

        .btn-submit:active {
            transform: translateY(-1px);
        }

        .btn-submit:disabled {
            background: #95a5a6;
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }

        .selection-counter {
            background: rgba(102, 126, 234, 0.1);
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 20px;
            text-align: center;
        }

        .counter-text {
            color: #667eea;
            font-weight: 600;
            font-size: 1rem;
        }

        .icon {
            font-size: 1.2rem;
        }

        @media (max-width: 768px) {
            .container {
                padding: 30px 20px;
                margin: 10px;
            }
            
            .header h1 {
                font-size: 1.8rem;
            }
            
            .student-item {
                padding: 15px;
            }
            
            .btn-submit {
                padding: 12px 30px;
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>📜 Pilih Penerima Sertifikat</h1>
            <p>Silahkan Pilih Penerima Sertifikat</p>
            <div class="divider"></div>
        </div>

        <form action="{{ route('admin.pilih-sertifikat.proses', $nim) }}" method="POST">
            @csrf
            
            <div class="selection-counter">
                <div class="counter-text">
                    <span id="selected-count">0</span> mahasiswa terpilih untuk menerima sertifikat.
                </div>
            </div>

            <div class="student-list">
                @foreach ($anggota as $anggotaItem)
                    @php
                        $checked = !empty($mahasiswa->sertifikat_dikirim[$anggotaItem['nim']]);
                    @endphp
                    <div class="student-item {{ $checked ? 'sent' : '' }}">
                        <label class="student-checkbox">
                            <input type="checkbox" name="anggota_nim[]" value="{{ $anggotaItem['nim'] }}" {{ $checked ? 'checked disabled' : '' }}>
                            <div class="student-info">
                                <div class="student-name">{{ $anggotaItem['nama'] }}</div>
                                <div class="student-nim">NIM: {{ $anggotaItem['nim'] }}</div>
                            </div>
                        </label>
                    </div>
                @endforeach
            </div>

            <div class="submit-section">
                <button type="submit" class="btn-submit" id="submit-btn">
                    <span class="icon">📤</span>
                    Kirim Sertifikat
                </button>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const checkboxes = document.querySelectorAll('input[type="checkbox"]:not([disabled])');
            const selectedCountElement = document.getElementById('selected-count');
            const submitBtn = document.getElementById('submit-btn');

            function updateCounter() {
                const selectedCount = document.querySelectorAll('input[type="checkbox"]:checked:not([disabled])').length;
                selectedCountElement.textContent = selectedCount;
                
                if (selectedCount === 0) {
                    submitBtn.disabled = true;
                    submitBtn.innerHTML = '<span class="icon">📤</span> Pilih Penerima Sertifikat';
                } else {
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = `<span class="icon">📤</span> Kirim Sertifikat (${selectedCount})`;
                }
            }

            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', updateCounter);
            });

            // Initial counter update
            updateCounter();

            // Add click effect for student items
            const studentItems = document.querySelectorAll('.student-item:not(.sent)');
            studentItems.forEach(item => {
                item.addEventListener('click', function(e) {
                    if (e.target.type !== 'checkbox') {
                        const checkbox = item.querySelector('input[type="checkbox"]');
                        if (checkbox && !checkbox.disabled) {
                            checkbox.checked = !checkbox.checked;
                            updateCounter();
                        }
                    }
                });
            });
        });
    </script>
</body>
</html>