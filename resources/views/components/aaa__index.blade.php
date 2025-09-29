<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>จองตั๋วเรือ - Siri Lanta Speedboats</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-blue: #5DADE2;
            --secondary-blue: #3498DB;
            --dark-blue: #2980B9;
            --primary-orange: #F39C12;
            --secondary-orange: #E67E22;
            --dark-orange: #D35400;
        }

        body {
            background: linear-gradient(135deg, rgba(93, 173, 226, 0.1) 0%, rgba(243, 156, 18, 0.1) 100%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
        }

        .navbar {
            background: linear-gradient(90deg, var(--secondary-blue) 0%, var(--primary-blue) 100%);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
            color: white !important;
        }

        .hero-section {
            background: linear-gradient(135deg, var(--secondary-blue) 0%, var(--primary-blue) 50%, var(--primary-orange) 100%);
            color: white;
            padding: 4rem 0 2rem 0;
            margin-bottom: 2rem;
        }

        .booking-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            border: none;
            overflow: hidden;
        }

        .card-header {
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--secondary-blue) 100%);
            color: white;
            border: none;
            padding: 1.5rem;
        }

        .form-control,
        .form-select {
            border: 2px solid #e3f2fd;
            border-radius: 12px;
            padding: 12px 16px;
            transition: all 0.3s ease;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 0.2rem rgba(93, 173, 226, 0.25);
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary-orange) 0%, var(--secondary-orange) 100%);
            border: none;
            border-radius: 12px;
            padding: 12px 24px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, var(--secondary-orange) 0%, var(--dark-orange) 100%);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(243, 156, 18, 0.3);
        }

        .btn-outline-primary {
            color: var(--primary-blue);
            border: 2px solid var(--primary-blue);
            border-radius: 12px;
            padding: 10px 20px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-outline-primary:hover {
            background-color: var(--primary-blue);
            border-color: var(--primary-blue);
        }

        .trip-type-card {
            border: 2px solid #e3f2fd;
            border-radius: 15px;
            padding: 1.5rem;
            margin-bottom: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            background: white;
        }

        .trip-type-card:hover {
            border-color: var(--primary-blue);
            box-shadow: 0 5px 15px rgba(93, 173, 226, 0.2);
        }

        .trip-type-card.active {
            border-color: var(--primary-orange);
            background: linear-gradient(135deg, rgba(243, 156, 18, 0.1) 0%, rgba(230, 126, 34, 0.1) 100%);
        }

        .summary-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 100px;
        }

        .summary-header {
            background: linear-gradient(135deg, var(--primary-orange) 0%, var(--secondary-orange) 100%);
            color: white;
            padding: 1.5rem;
            border-radius: 20px 20px 0 0;
        }

        .price-highlight {
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--secondary-blue) 100%);
            color: white;
            padding: 1rem;
            border-radius: 12px;
            text-align: center;
            margin-top: 1rem;
        }

        .step-indicator {
            display: flex;
            justify-content: center;
            margin-bottom: 2rem;
        }

        .step {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #e3f2fd;
            color: var(--secondary-blue);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            margin: 0 1rem;
            position: relative;
        }

        .step.active {
            background: var(--primary-orange);
            color: white;
        }

        .step.completed {
            background: var(--primary-blue);
            color: white;
        }

        .step::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 100%;
            width: 2rem;
            height: 2px;
            background: #e3f2fd;
            transform: translateY(-50%);
        }

        .step:last-child::after {
            display: none;
        }

        .route-card {
            border: 2px solid #e3f2fd;
            border-radius: 15px;
            padding: 1.5rem;
            margin-bottom: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .route-card:hover {
            border-color: var(--primary-blue);
            box-shadow: 0 5px 15px rgba(93, 173, 226, 0.2);
        }

        .route-card.selected {
            border-color: var(--primary-orange);
            background: linear-gradient(135deg, rgba(243, 156, 18, 0.1) 0%, rgba(230, 126, 34, 0.1) 100%);
        }

        .payment-method-card {
            border: 2px solid #e3f2fd;
            border-radius: 15px;
            cursor: pointer;
            transition: all 0.3s ease;
            background: white;
        }

        .payment-method-card:hover {
            border-color: var(--primary-blue);
            box-shadow: 0 5px 15px rgba(93, 173, 226, 0.2);
        }

        .payment-method-card.active {
            border-color: var(--primary-orange);
            background: linear-gradient(135deg, rgba(243, 156, 18, 0.1) 0%, rgba(230, 126, 34, 0.1) 100%);
        }

        .passenger-form {
            background: #f8f9fa;
            border-radius: 15px;
            padding: 1.5rem;
            margin-bottom: 1rem;
            border: 1px solid #e9ecef;
        }

        .alert-info {
            background: linear-gradient(135deg, rgba(93, 173, 226, 0.1) 0%, rgba(52, 152, 219, 0.1) 100%);
            border: 1px solid var(--primary-blue);
            border-radius: 12px;
        }

        .form-check-input:checked {
            background-color: var(--primary-orange);
            border-color: var(--primary-orange);
        }

        .confirmation-section {
            background: linear-gradient(135deg, #d4edda 0%, #c3e6cb 100%);
            border-radius: 20px;
            padding: 3rem 2rem;
            text-align: center;
            margin: 2rem 0;
        }

        .booking-reference {
            background: white;
            border-radius: 12px;
            padding: 1rem;
            display: inline-block;
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--primary-blue);
            border: 2px dashed var(--primary-blue);
        }

        .wave-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%235DADE2' fill-opacity='0.1'%3E%3Cpath d='M30 30c0-11.046-8.954-20-20-20s-20 8.954-20 20 8.954 20 20 20 20-8.954 20-20zm0 20c0-11.046-8.954-20-20-20s-20 8.954-20 20 8.954 20 20 20 20-8.954 20-20z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }

    </style>
</head>
<body class="wave-pattern">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-ship me-2"></i>
                Siri Lanta Speedboats
            </a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link text-white" href="#">หน้าแรก</a>
                <a class="nav-link text-white" href="#">เกี่ยวกับเรา</a>
                <a class="nav-link text-white" href="#">ติดต่อ</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section text-center">
        <div class="container">
            <h1 class="display-4 fw-bold mb-3">จองตั๋วเรือด่วน</h1>
            <p class="lead">เดินทางสู่เกาะในฝันของคุณ ด้วยบริการเรือด่วนที่ปลอดภัยและสะดวกสบาย</p>
        </div>
    </section>

    <div class="container">
        <!-- Step Indicator -->
        <div class="step-indicator">
            <div class="step active">1</div>
            <div class="step">2</div>
            <div class="step">3</div>
            <div class="step">4</div>
        </div>

        <div class="row">
            <!-- Main Booking Form -->
            <div class="col-lg-8">
                <!-- Step 1: Trip Selection -->
                <div class="card booking-card">
                    <div class="card-header">
                        <h4 class="mb-0"><i class="fas fa-calendar-alt me-2"></i>เลือกรูปแบบการเดินทาง</h4>
                    </div>
                    <div class="card-body p-4">
                        <!-- Trip Type Selection -->
                        <div class="row mb-4">
                            <div class="col-md-4">
                                <div class="trip-type-card active" data-trip="oneway">
                                    <div class="text-center">
                                        <i class="fas fa-arrow-right fa-2x text-primary mb-2"></i>
                                        <h6>เที่ยวเดียว</h6>
                                        <small class="text-muted">One Way</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="trip-type-card" data-trip="return">
                                    <div class="text-center">
                                        <i class="fas fa-exchange-alt fa-2x text-primary mb-2"></i>
                                        <h6>ไป-กลับ</h6>
                                        <small class="text-muted">Return</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="trip-type-card" data-trip="multicity">
                                    <div class="text-center">
                                        <i class="fas fa-map-marked-alt fa-2x text-primary mb-2"></i>
                                        <h6>หลายเมือง</h6>
                                        <small class="text-muted">Multi City</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Route Selection -->
                        <div class="row mb-4">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">จุดต้นทาง</label>
                                <select class="form-select">
                                    <option value="">เลือกจุดต้นทาง</option>
                                    <option value="lanta">เกาะลันตา</option>
                                    <option value="krabi">กระบี่</option>
                                    <option value="phi_phi">เกาะพีพี</option>
                                    <option value="phuket">ภูเก็ต</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">จุดหมาย</label>
                                <select class="form-select">
                                    <option value="">เลือกจุดหมาย</option>
                                    <option value="lanta">เกาะลันตา</option>
                                    <option value="krabi">กระบี่</option>
                                    <option value="phi_phi">เกาะพีพี</option>
                                    <option value="phuket">ภูเก็ต</option>
                                </select>
                            </div>
                        </div>

                        <!-- Date and Passenger Selection -->
                        <div class="row mb-4">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">วันที่เดินทาง</label>
                                <input type="date" class="form-control" id="departure-date">
                            </div>
                            <div class="col-md-6 mb-3" id="return-date-section" style="display: none;">
                                <label class="form-label fw-bold">วันที่กลับ</label>
                                <input type="date" class="form-control" id="return-date">
                            </div>
                        </div>

                        <!-- Passengers -->
                        <div class="row mb-4">
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-bold">ผู้ใหญ่</label>
                                <div class="input-group">
                                    <button class="btn btn-outline-secondary" type="button" id="adult-minus">-</button>
                                    <input type="text" class="form-control text-center" value="1" id="adult-count" readonly>
                                    <button class="btn btn-outline-secondary" type="button" id="adult-plus">+</button>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-bold">เด็ก (3-11 ปี)</label>
                                <div class="input-group">
                                    <button class="btn btn-outline-secondary" type="button" id="child-minus">-</button>
                                    <input type="text" class="form-control text-center" value="0" id="child-count" readonly>
                                    <button class="btn btn-outline-secondary" type="button" id="child-plus">+</button>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-bold">ทารก (0-2 ปี)</label>
                                <div class="input-group">
                                    <button class="btn btn-outline-secondary" type="button" id="infant-minus">-</button>
                                    <input type="text" class="form-control text-center" value="0" id="infant-count" readonly>
                                    <button class="btn btn-outline-secondary" type="button" id="infant-plus">+</button>
                                </div>
                            </div>
                        </div>

                        <div class="d-grid">
                            <button class="btn btn-primary btn-lg" id="search-boats">
                                <i class="fas fa-search me-2"></i>ค้นหาเรือ
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Step 2: Route Selection -->
                <div class="card booking-card mt-4" id="routes-section" style="display: none;">
                    <div class="card-header">
                        <h4 class="mb-0"><i class="fas fa-ship me-2"></i>เลือกเวลาเดินทาง</h4>
                    </div>
                    <div class="card-body p-4">
                        <div class="route-card">
                            <div class="row align-items-center">
                                <div class="col-md-3">
                                    <h6 class="mb-1">08:00</h6>
                                    <small class="text-muted">เกาะลันตา</small>
                                </div>
                                <div class="col-md-3 text-center">
                                    <i class="fas fa-ship text-primary"></i>
                                    <br><small>1 ชม. 30 นาที</small>
                                </div>
                                <div class="col-md-3">
                                    <h6 class="mb-1">09:30</h6>
                                    <small class="text-muted">เกาะพีพี</small>
                                </div>
                                <div class="col-md-3 text-end">
                                    <h5 class="text-primary mb-1">฿850</h5>
                                    <small class="text-muted">ผู้ใหญ่</small>
                                </div>
                            </div>
                        </div>

                        <div class="route-card">
                            <div class="row align-items-center">
                                <div class="col-md-3">
                                    <h6 class="mb-1">13:00</h6>
                                    <small class="text-muted">เกาะลันตา</small>
                                </div>
                                <div class="col-md-3 text-center">
                                    <i class="fas fa-ship text-primary"></i>
                                    <br><small>1 ชม. 30 นาที</small>
                                </div>
                                <div class="col-md-3">
                                    <h6 class="mb-1">14:30</h6>
                                    <small class="text-muted">เกาะพีพี</small>
                                </div>
                                <div class="col-md-3 text-end">
                                    <h5 class="text-primary mb-1">฿850</h5>
                                    <small class="text-muted">ผู้ใหญ่</small>
                                </div>
                            </div>
                        </div>

                        <div class="d-grid mt-4">
                            <button class="btn btn-primary btn-lg" id="continue-booking">
                                <i class="fas fa-arrow-right me-2"></i>ดำเนินการต่อ
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Step 3: Passenger Information -->
                <div class="card booking-card mt-4" id="passenger-section" style="display: none;">
                    <div class="card-header">
                        <h4 class="mb-0"><i class="fas fa-users me-2"></i>ข้อมูลผู้โดยสาร</h4>
                    </div>
                    <div class="card-body p-4">
                        <!-- Contact Information -->
                        <div class="mb-4">
                            <h5 class="text-primary mb-3">ข้อมูลติดต่อ</h5>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">อีเมล <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" placeholder="your@email.com" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold">เบอร์โทรศัพท์ <span class="text-danger">*</span></label>
                                    <input type="tel" class="form-control" placeholder="08x-xxx-xxxx" required>
                                </div>
                            </div>
                        </div>

                        <!-- Adult Passengers -->
                        <div class="mb-4" id="adult-passengers">
                            <h5 class="text-primary mb-3">ผู้ใหญ่</h5>
                            <div class="passenger-form mb-3" data-passenger="adult-1">
                                <div class="row">
                                    <div class="col-md-2 mb-3">
                                        <label class="form-label fw-bold">คำนำหน้า</label>
                                        <select class="form-select">
                                            <option value="mr">นาย</option>
                                            <option value="mrs">นาง</option>
                                            <option value="ms">นางสาว</option>
                                        </select>
                                    </div>
                                    <div class="col-md-5 mb-3">
                                        <label class="form-label fw-bold">ชื่อ <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="ชื่อ" required>
                                    </div>
                                    <div class="col-md-5 mb-3">
                                        <label class="form-label fw-bold">นามสกุล <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="นามสกุล" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-bold">วันเกิด</label>
                                        <input type="date" class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-bold">สัญชาติ</label>
                                        <select class="form-select">
                                            <option value="thai">ไทย</option>
                                            <option value="other">อื่นๆ</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Child Passengers -->
                        <div class="mb-4" id="child-passengers" style="display: none;">
                            <h5 class="text-primary mb-3">เด็ก (3-11 ปี)</h5>
                        </div>

                        <!-- Infant Passengers -->
                        <div class="mb-4" id="infant-passengers" style="display: none;">
                            <h5 class="text-primary mb-3">ทารก (0-2 ปี)</h5>
                        </div>

                        <!-- Special Requests -->
                        <div class="mb-4">
                            <h5 class="text-primary mb-3">ความต้องการพิเศษ</h5>
                            <textarea class="form-control" rows="3" placeholder="กรุณาระบุความต้องการพิเศษ (ถ้ามี) เช่น อาหารพิเศษ, ความช่วยเหลือ"></textarea>
                        </div>

                        <div class="d-grid">
                            <button class="btn btn-primary btn-lg" id="proceed-payment">
                                <i class="fas fa-credit-card me-2"></i>ไปหน้าชำระเงิน
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Step 4: Payment -->
                <div class="card booking-card mt-4" id="payment-section" style="display: none;">
                    <div class="card-header">
                        <h4 class="mb-0"><i class="fas fa-credit-card me-2"></i>ชำระเงิน</h4>
                    </div>
                    <div class="card-body p-4">
                        <!-- Payment Methods -->
                        <div class="mb-4">
                            <h5 class="text-primary mb-3">เลือกวิธีชำระเงิน</h5>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="payment-method-card" data-method="credit">
                                        <div class="text-center p-3">
                                            <i class="fas fa-credit-card fa-2x text-primary mb-2"></i>
                                            <h6>บัตรเครดิต/เดบิต</h6>
                                            <small class="text-muted">Visa, MasterCard, JCB</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="payment-method-card" data-method="banking">
                                        <div class="text-center p-3">
                                            <i class="fas fa-university fa-2x text-primary mb-2"></i>
                                            <h6>โอนเงิน</h6>
                                            <small class="text-muted">ธนาคารไทยทุกธนาคาร</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Credit Card Form -->
                        <div id="credit-card-form">
                            <div class="row mb-3">
                                <div class="col-12">
                                    <label class="form-label fw-bold">หมายเลขบัตร</label>
                                    <input type="text" class="form-control" placeholder="1234 5678 9012 3456" maxlength="19" id="card-number">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-8">
                                    <label class="form-label fw-bold">ชื่อบนบัตร</label>
                                    <input type="text" class="form-control" placeholder="JOHN SMITH">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-bold">วันหมดอายุ</label>
                                    <input type="text" class="form-control" placeholder="MM/YY" maxlength="5" id="expiry-date">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">CVV</label>
                                    <input type="text" class="form-control" placeholder="123" maxlength="4" id="cvv">
                                </div>
                            </div>
                        </div>

                        <!-- Banking Transfer Info -->
                        <div id="banking-info" style="display: none;">
                            <div class="alert alert-info">
                                <h6><i class="fas fa-info-circle me-2"></i>ข้อมูลการโอนเงิน</h6>
                                <p class="mb-2"><strong>ธนาคาร:</strong> กสิกรไทย</p>
                                <p class="mb-2"><strong>เลขที่บัญชี:</strong> 123-4-56789-0</p>
                                <p class="mb-2"><strong>ชื่อบัญชี:</strong> บริษัท ศิริลันตา สปีดโบ๊ท จำกัด</p>
                                <p class="mb-0"><strong>จำนวนเงิน:</strong> <span class="text-primary fw-bold">฿900</span></p>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">อัปโหลดสลิปการโอน</label>
                                <input type="file" class="form-control" accept="image/*">
                            </div>
                        </div>

                        <!-- Terms and Conditions -->
                        <div class="mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="terms-check">
                                <label class="form-check-label" for="terms-check">
                                    ฉันยอมรับ <a href="#" class="text-primary">ข้อกำหนดและเงื่อนไข</a> และ <a href="#" class="text-primary">นโยบายความเป็นส่วนตัว</a>
                                </label>
                            </div>
                        </div>

                        <div class="d-grid">
                            <button class="btn btn-success btn-lg" id="confirm-payment" disabled>
                                <i class="fas fa-lock me-2"></i>ยืนยันการชำระเงิน
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Booking Confirmation -->
                <div class="confirmation-section" id="confirmation-section" style="display: none;">
                    <div class="text-center">
                        <i class="fas fa-check-circle fa-4x text-success mb-4"></i>
                        <h2 class="text-success mb-3">การจองสำเร็จ!</h2>
                        <p class="lead mb-4">ขอบคุณสำหรับการจองตั๋วเรือกับเรา</p>

                        <div class="booking-reference mb-4">
                            หมายเลขการจอง: SL2024120001
                        </div>

                        <div class="row justify-content-center mb-4">
                            <div class="col-md-8">
                                <div class="alert alert-info">
                                    <h6><i class="fas fa-info-circle me-2"></i>ข้อมูลสำคัญ</h6>
                                    <ul class="list-unstyled mb-0">
                                        <li>• กรุณามาถึงจุดขึ้นเรือก่อนเวลา 30 นาที</li>
                                        <li>• นำบัตรประชาชนหรือหนังสือเดินทางมาด้วย</li>
                                        <li>• E-ticket จะส่งไปยังอีเมลของคุณในอีก 5 นาที</li>
                                        <li>• สามารถยกเลิกได้ภายใน 24 ชั่วโมง</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-center gap-3">
                            <button class="btn btn-primary">
                                <i class="fas fa-download me-2"></i>ดาวน์โหลด E-ticket
                            </button>
                            <button class="btn btn-outline-primary" onclick="window.print()">
                                <i class="fas fa-print me-2"></i>พิมพ์
                            </button>
                            <button class="btn btn-secondary" onclick="location.reload()">
                                <i class="fas fa-plus me-2"></i>จองเพิ่ม
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Summary Sidebar -->
            <div class="col-lg-4">
                <div class="summary-card" id="summary-card">
                    <div class="summary-header">
                        <h5 class="mb-0"><i class="fas fa-clipboard-list me-2"></i>สรุปการจอง</h5>
                    </div>
                    <div class="p-4">
                        <div class="mb-3">
                            <h6 class="text-muted">การเดินทาง</h6>
                            <p class="mb-1" id="trip-type-summary">เที่ยวเดียว</p>
                        </div>

                        <div class="mb-3" id="route-summary" style="display: none;">
                            <h6 class="text-muted">เส้นทาง</h6>
                            <p class="mb-1">เกาะลันตา → เกาะพีพี</p>
                            <small class="text-muted">วันที่ 25 ธ.ค. 2024</small>
                        </div>

                        <div class="mb-3" id="passenger-summary">
                            <h6 class="text-muted">ผู้โดยสาร</h6>
                            <p class="mb-1">ผู้ใหญ่ 1 คน</p>
                        </div>

                        <hr>

                        <div class="mb-3" id="price-breakdown" style="display: none;">
                            <div class="d-flex justify-content-between mb-2">
                                <span>ผู้ใหญ่ x 1</span>
                                <span>฿850</span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span>ภาษี</span>
                                <span>฿50</span>
                            </div>
                        </div>

                        <div class="price-highlight" id="total-price" style="display: none;">
                            <h4 class="mb-0">รวมทั้งหมด</h4>
                            <h3 class="mb-0">฿900</h3>
                        </div>

                        <div class="mt-3" id="booking-actions" style="display: none;">
                            <div class="d-grid">
                                <button class="btn btn-success btn-lg">
                                    <i class="fas fa-lock me-2"></i>จองเลย
                                </button>
                            </div>
                        </div>

                        <!-- Booking Summary Details -->
                        <div class="mt-3" id="booking-summary-details" style="display: none;">
                            <hr>
                            <h6 class="text-muted mb-3">รายละเอียดการจอง</h6>
                            <div class="small">
                                <div class="mb-2">
                                    <strong>รหัสเที่ยว:</strong> SL001-08:00
                                </div>
                                <div class="mb-2">
                                    <strong>ประเภทเรือ:</strong> Speedboat
                                </div>
                                <div class="mb-2">
                                    <strong>ที่นั่ง:</strong> A1-A3
                                </div>
                                <div class="mb-2">
                                    <strong>อำนวยความสะดวก:</strong>
                                    <br>• เสื้อชูชีพ
                                    <br>• น้ำดื่ม
                                    <br>• ประกันภัย
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Trip type selection
            document.querySelectorAll('.trip-type-card').forEach(card => {
                card.addEventListener('click', function() {
                    document.querySelectorAll('.trip-type-card').forEach(c => c.classList.remove('active'));
                    this.classList.add('active');

                    const tripType = this.dataset.trip;
                    const returnDateSection = document.getElementById('return-date-section');
                    const tripTypeSummary = document.getElementById('trip-type-summary');

                    if (tripType === 'return') {
                        returnDateSection.style.display = 'block';
                        tripTypeSummary.textContent = 'ไป-กลับ';
                    } else if (tripType === 'multicity') {
                        returnDateSection.style.display = 'none';
                        tripTypeSummary.textContent = 'หลายเมือง';
                    } else {
                        returnDateSection.style.display = 'none';
                        tripTypeSummary.textContent = 'เที่ยวเดียว';
                    }
                });
            });

            // Passenger counter functionality
            function setupCounter(minusId, plusId, countId, min = 0, max = 10) {
                const minusBtn = document.getElementById(minusId);
                const plusBtn = document.getElementById(plusId);
                const countInput = document.getElementById(countId);

                minusBtn.addEventListener('click', function() {
                    let count = parseInt(countInput.value);
                    if (count > min) {
                        countInput.value = count - 1;
                        updatePassengerSummary();
                    }
                });

                plusBtn.addEventListener('click', function() {
                    let count = parseInt(countInput.value);
                    if (count < max) {
                        countInput.value = count + 1;
                        updatePassengerSummary();
                    }
                });
            }

            setupCounter('adult-minus', 'adult-plus', 'adult-count', 1);
            setupCounter('child-minus', 'child-plus', 'child-count');
            setupCounter('infant-minus', 'infant-plus', 'infant-count');

            function updatePassengerSummary() {
                const adults = parseInt(document.getElementById('adult-count').value);
                const children = parseInt(document.getElementById('child-count').value);
                const infants = parseInt(document.getElementById('infant-count').value);

                let summary = [];
                if (adults > 0) summary.push(`ผู้ใหญ่ ${adults} คน`);
                if (children > 0) summary.push(`เด็ก ${children} คน`);
                if (infants > 0) summary.push(`ทารก ${infants} คน`);

                document.getElementById('passenger-summary').innerHTML =
                    '<h6 class="text-muted">ผู้โดยสาร</h6><p class="mb-1">' + summary.join(', ') + '</p>';
            }

            // Search boats functionality
            document.getElementById('search-boats').addEventListener('click', function() {
                // Show routes section
                document.getElementById('routes-section').style.display = 'block';
                document.getElementById('route-summary').style.display = 'block';

                // Update step indicator
                document.querySelectorAll('.step')[0].classList.add('completed');
                document.querySelectorAll('.step')[0].classList.remove('active');
                document.querySelectorAll('.step')[1].classList.add('active');

                // Scroll to routes section
                document.getElementById('routes-section').scrollIntoView({
                    behavior: 'smooth'
                });
            });

            // Route selection
            document.querySelectorAll('.route-card').forEach(card => {
                card.addEventListener('click', function() {
                    document.querySelectorAll('.route-card').forEach(c => c.classList.remove('selected'));
                    this.classList.add('selected');

                    // Show price breakdown and total
                    document.getElementById('price-breakdown').style.display = 'block';
                    document.getElementById('total-price').style.display = 'block';
                    document.getElementById('booking-actions').style.display = 'block';
                    document.getElementById('booking-summary-details').style.display = 'block';
                });
            });

            // Continue booking
            document.getElementById('continue-booking').addEventListener('click', function() {
                // Update step indicator
                document.querySelectorAll('.step')[1].classList.add('completed');
                document.querySelectorAll('.step')[1].classList.remove('active');
                document.querySelectorAll('.step')[2].classList.add('active');

                // Show passenger section
                document.getElementById('passenger-section').style.display = 'block';
                generatePassengerForms();
                document.getElementById('passenger-section').scrollIntoView({
                    behavior: 'smooth'
                });
            });

            // Generate passenger forms based on selected count
            function generatePassengerForms() {
                const adults = parseInt(document.getElementById('adult-count').value);
                const children = parseInt(document.getElementById('child-count').value);
                const infants = parseInt(document.getElementById('infant-count').value);

                // Generate child forms
                if (children > 0) {
                    const childSection = document.getElementById('child-passengers');
                    childSection.style.display = 'block';
                    childSection.innerHTML = '<h5 class="text-primary mb-3">เด็ก (3-11 ปี)</h5>';

                    for (let i = 1; i <= children; i++) {
                        childSection.innerHTML += createPassengerForm(`child-${i}`, `เด็กคนที่ ${i}`);
                    }
                }

                // Generate infant forms
                if (infants > 0) {
                    const infantSection = document.getElementById('infant-passengers');
                    infantSection.style.display = 'block';
                    infantSection.innerHTML = '<h5 class="text-primary mb-3">ทารก (0-2 ปี)</h5>';

                    for (let i = 1; i <= infants; i++) {
                        infantSection.innerHTML += createPassengerForm(`infant-${i}`, `ทารกคนที่ ${i}`);
                    }
                }
            }

            function createPassengerForm(id, title) {
                return `
                    <div class="passenger-form mb-3" data-passenger="${id}">
                        <h6 class="mb-3 text-secondary">${title}</h6>
                        <div class="row">
                            <div class="col-md-2 mb-3">
                                <label class="form-label fw-bold">คำนำหน้า</label>
                                <select class="form-select">
                                    <option value="mr">เด็กชาย</option>
                                    <option value="ms">เด็กหญิง</option>
                                </select>
                            </div>
                            <div class="col-md-5 mb-3">
                                <label class="form-label fw-bold">ชื่อ <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="ชื่อ" required>
                            </div>
                            <div class="col-md-5 mb-3">
                                <label class="form-label fw-bold">นามสกุล <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="นามสกุล" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">วันเกิด</label>
                                <input type="date" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">สัญชาติ</label>
                                <select class="form-select">
                                    <option value="thai">ไทย</option>
                                    <option value="other">อื่นๆ</option>
                                </select>
                            </div>
                        </div>
                    </div>
                `;
            }

            // Proceed to payment
            document.getElementById('proceed-payment').addEventListener('click', function() {
                // Update step indicator
                document.querySelectorAll('.step')[2].classList.add('completed');
                document.querySelectorAll('.step')[2].classList.remove('active');
                document.querySelectorAll('.step')[3].classList.add('active');

                // Show payment section
                document.getElementById('payment-section').style.display = 'block';
                document.getElementById('payment-section').scrollIntoView({
                    behavior: 'smooth'
                });
            });

            // Payment method selection
            document.querySelectorAll('.payment-method-card').forEach(card => {
                card.addEventListener('click', function() {
                    document.querySelectorAll('.payment-method-card').forEach(c => c.classList.remove('active'));
                    this.classList.add('active');

                    const method = this.dataset.method;
                    const creditForm = document.getElementById('credit-card-form');
                    const bankingInfo = document.getElementById('banking-info');

                    if (method === 'credit') {
                        creditForm.style.display = 'block';
                        bankingInfo.style.display = 'none';
                    } else {
                        creditForm.style.display = 'none';
                        bankingInfo.style.display = 'block';
                    }
                });
            });

            // Terms checkbox validation
            document.getElementById('terms-check').addEventListener('change', function() {
                document.getElementById('confirm-payment').disabled = !this.checked;
            });

            // Credit card number formatting
            document.getElementById('card-number').addEventListener('input', function(e) {
                let value = e.target.value.replace(/\s/g, '').replace(/[^0-9]/gi, '');
                let formattedValue = value;
                if (formattedValue.length > 19) formattedValue = formattedValue.substr(0, 19);
                e.target.value = formattedValue;
            });

            // Expiry date formatting
            document.getElementById('expiry-date').addEventListener('input', function(e) {
                let value = e.target.value.replace(/\D/g, '');
                if (value.length >= 2) {
                    value = value.substring(0, 2) + '/' + value.substring(2, 4);
                }
                e.target.value = value;
            });

            // CVV formatting
            document.getElementById('cvv').addEventListener('input', function(e) {
                e.target.value = e.target.value.replace(/\D/g, '').substring(0, 4);
            });

            // Phone number formatting
            document.querySelector('input[placeholder="08x-xxx-xxxx"]').addEventListener('input', function(e) {
                let value = e.target.value.replace(/\D/g, '');
                if (value.length > 3 && value.length <= 6) {
                    value = value.substring(0, 3) + '-' + value.substring(3);
                } else if (value.length > 6) {
                    value = value.substring(0, 3) + '-' + value.substring(3, 6) + '-' + value.substring(6, 10);
                }
                e.target.value = value;
            });

            // Confirm payment
            document.getElementById('confirm-payment').addEventListener('click', function() {
                // Show loading state
                this.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>กำลังดำเนินการ...';
                this.disabled = true;

                // Simulate payment processing
                setTimeout(() => {
                    // Hide all sections
                    document.querySelectorAll('.booking-card').forEach(section => {
                        section.style.display = 'none';
                    });

                    // Show confirmation
                    document.getElementById('confirmation-section').style.display = 'block';
                    document.getElementById('confirmation-section').scrollIntoView({
                        behavior: 'smooth'
                    });

                    // Update summary to show completed booking
                    updateSummaryForConfirmation();
                }, 2000);
            });

            function updateSummaryForConfirmation() {
                const summaryCard = document.getElementById('summary-card');
                summaryCard.innerHTML = `
                    <div class="summary-header">
                        <h5 class="mb-0"><i class="fas fa-check-circle me-2"></i>จองสำเร็จ</h5>
                    </div>
                    <div class="p-4">
                        <div class="mb-3">
                            <h6 class="text-muted">หมายเลขการจอง</h6>
                            <p class="mb-1 fw-bold text-primary">SL2024120001</p>
                        </div>

                        <div class="mb-3">
                            <h6 class="text-muted">สถานะ</h6>
                            <span class="badge bg-success">ชำระเงินแล้ว</span>
                        </div>

                        <div class="mb-3">
                            <h6 class="text-muted">เส้นทาง</h6>
                            <p class="mb-1">เกาะลันตา → เกาะพีพี</p>
                            <small class="text-muted">25 ธ.ค. 2024 เวลา 08:00</small>
                        </div>

                        <div class="mb-3">
                            <h6 class="text-muted">ผู้โดยสาร</h6>
                            <p class="mb-1">ผู้ใหญ่ 1 คน</p>
                        </div>

                        <hr>

                        <div class="price-highlight">
                            <h5 class="mb-0">ยอดชำระ</h5>
                            <h4 class="mb-0">฿900</h4>
                        </div>

                        <div class="mt-3">
                            <div class="d-grid gap-2">
                                <button class="btn btn-outline-primary btn-sm">
                                    <i class="fas fa-envelope me-2"></i>ส่ง E-ticket
                                </button>
                                <button class="btn btn-outline-secondary btn-sm">
                                    <i class="fas fa-phone me-2"></i>ติดต่อเรา
                                </button>
                            </div>
                        </div>
                    </div>
                `;
            }

            // Initialize payment method selection
            setTimeout(() => {
                if (document.querySelector('.payment-method-card[data-method="credit"]')) {
                    document.querySelector('.payment-method-card[data-method="credit"]').click();
                }
            }, 100);

            // Initialize passenger summary
            updatePassengerSummary();
        });

    </script>
</body>
</html>
