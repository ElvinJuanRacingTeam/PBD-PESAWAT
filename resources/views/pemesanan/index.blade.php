<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Ticket Bookings - Ayo Terbang</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

<style>
body{margin:0;font-family:'Poppins',sans-serif;background:#f4f6fb;}
.wrapper{display:flex;height:100vh;}
.sidebar{
    width:260px;background:linear-gradient(180deg,#4f46e5,#7c3aed);
    color:white;padding:25px 20px;display:flex;flex-direction:column;justify-content:space-between;
}
.logo-box{display:flex;align-items:center;gap:12px;margin-bottom:40px;}
.logo{
    width:52px;height:52px;background:white;border-radius:14px;
    display:flex;align-items:center;justify-content:center;font-size:26px;
    color:#4f46e5;font-weight:bold;transition:0.4s;
}
.logo:hover{transform:rotate(20deg) scale(1.15);}
.brand{font-size:20px;font-weight:700;}
.menu a{
    display:flex;align-items:center;gap:10px;color:white;text-decoration:none;
    padding:12px;border-radius:10px;margin-bottom:8px;font-weight:500;
}
.menu a:hover{background:rgba(255,255,255,0.2);}
.menu a.active{background:rgba(255,255,255,0.25);}
.profile-box{
    background:rgba(255,255,255,0.12);border-radius:14px;padding:15px;
    display:flex;align-items:center;gap:10px;
}
.profile-circle{
    width:40px;height:40px;border-radius:50%;background:#6366f1;
    display:flex;align-items:center;justify-content:center;font-weight:700;
}
.logout{color:#ffb4b4;text-decoration:none;font-size:13px;margin-top:8px;display:inline-block;}

.main{flex:1;padding:30px;overflow-y:auto;}
.header{display:flex;justify-content:space-between;align-items:center;margin-bottom:30px;}
.header h1{font-size:26px;font-weight:700;margin:0;}
.btn{
    padding:12px 24px;border-radius:10px;text-decoration:none;font-weight:600;
    cursor:pointer;border:none;transition:0.3s;display:inline-block;
}
.btn-primary{background:linear-gradient(135deg,#6366f1,#8b5cf6);color:white;}
.btn-primary:hover{transform:translateY(-2px);box-shadow:0 8px 20px rgba(99,102,241,0.3);}
.btn-edit{background:linear-gradient(135deg,#0ea5e9,#22d3ee);color:white;padding:8px 16px;font-size:13px;}
.btn-delete{background:linear-gradient(135deg,#f97316,#ea580c);color:white;padding:8px 16px;font-size:13px;}
.btn-edit:hover,.btn-delete:hover{transform:translateY(-2px);opacity:0.9;}

.section{
    background:white;border-radius:15px;padding:25px;
    box-shadow:0 4px 12px rgba(0,0,0,0.06);
}
table{width:100%;border-collapse:collapse;}
th,td{padding:14px;text-align:left;font-size:14px;}
th{font-weight:700;color:#4f46e5;border-bottom:2px solid #e5e7eb;}
tr:hover{background:#f9fafb;}
.badge{
    display:inline-block;padding:5px 12px;border-radius:20px;
    font-size:12px;font-weight:600;
}
.badge-card{background:#dbeafe;color:#1e40af;}
.badge-transfer{background:#fef3c7;color:#92400e;}
.badge-cash{background:#dcfce7;color:#166534;}
.actions{display:flex;gap:8px;}
.price{font-weight:700;color:#16a34a;}

/* Modal Styles */
.modal{
    display:none;position:fixed;top:0;left:0;width:100%;height:100%;
    background:rgba(0,0,0,0.5);align-items:center;justify-content:center;z-index:1000;
}
.modal.show{display:flex;}
.modal-content{
    background:white;border-radius:20px;padding:30px;width:90%;max-width:600px;
    max-height:85vh;overflow-y:auto;animation:slideIn 0.3s ease;
}
@keyframes slideIn{from{transform:translateY(-50px);opacity:0;}to{transform:translateY(0);opacity:1;}}
.modal-header{display:flex;justify-content:space-between;align-items:center;margin-bottom:25px;}
.modal-header h2{margin:0;font-size:22px;color:#4f46e5;}
.close{font-size:28px;cursor:pointer;color:#9ca3af;transition:0.3s;}
.close:hover{color:#4f46e5;transform:rotate(90deg);}
.form-group{margin-bottom:20px;}
.form-group label{display:block;margin-bottom:8px;font-weight:600;color:#374151;}
.form-group input,.form-group select{
    width:100%;padding:12px;border:2px solid #e5e7eb;border-radius:10px;
    font-family:'Poppins',sans-serif;font-size:14px;transition:0.3s;
}
.form-group input:focus,.form-group select:focus{outline:none;border-color:#6366f1;}
.form-actions{display:flex;gap:12px;justify-content:flex-end;margin-top:25px;}
.btn-cancel{background:#e5e7eb;color:#374151;}
.btn-cancel:hover{background:#d1d5db;}

.empty-state{
    text-align:center;padding:60px 20px;color:#9ca3af;
}
.empty-state svg{width:120px;height:120px;margin-bottom:20px;opacity:0.3;}
</style>
</head>
<body>

<div class="wrapper">

<div class="sidebar">
    <div>
        <div class="logo-box">
            <div class="logo">✈</div>
            <div class="brand">Ayo Terbang</div>
        </div>

        <div class="menu">
            <a href="/dashboard">Overview</a>
            <a href="/penumpang">Passenger Database</a>
            <a href="/penerbangan">Flight Schedule</a>
            <a href="/pemesanan" class="active">Ticket Bookings</a>
            <a href="/soal5">Analytics Report</a>
        </div>
    </div>

    <div>
        <div class="profile-box">
            <div class="profile-circle">AD</div>
            <div class="profile-text">
                <strong>Super Admin</strong><br>Management Level
            </div>
        </div>
        <a href="/logout" class="logout">Sign Out System</a>
    </div>
</div>

<div class="main">

    <div class="header">
        <h1>Ticket Bookings</h1>
        <a href="#" class="btn btn-primary" onclick="openModal('add'); return false;">+ New Booking</a>
    </div>

    <div class="section">
        @if($pemesanan->count() > 0)
        <table>
            <tr>
                <th>Booking ID</th>
                <th>Client Name</th>
                <th>Flight Route</th>
                <th>Seat</th>
                <th>Booking Date</th>
                <th>Payment</th>
                <th>Total Price</th>
                <th>Actions</th>
            </tr>

            @foreach($pemesanan as $p)
            <tr>
                <td><strong>#BK-{{ $p->id_pemesanan }}</strong></td>
                <td>{{ $p->penumpang->nama ?? 'N/A' }}</td>
                <td>{{ $p->penerbangan->kota_asal ?? 'N/A' }} → {{ $p->penerbangan->kota_tujuan ?? 'N/A' }}</td>
                <td><strong>{{ $p->nomor_kursi }}</strong></td>
                <td>{{ \Carbon\Carbon::parse($p->tgl_pemesanan)->format('d M Y') }}</td>
                <td>
                    @if($p->metode_pembayaran == 'Credit Card')
                    <span class="badge badge-card">Credit Card</span>
                    @elseif($p->metode_pembayaran == 'Transfer')
                    <span class="badge badge-transfer">Transfer</span>
                    @else
                    <span class="badge badge-cash">Cash</span>
                    @endif
                </td>
                <td class="price">Rp {{ number_format($p->total_harga, 0, ',', '.') }}</td>
                <td>
                    <div class="actions">
                        <a href="#" class="btn btn-edit" onclick="editBooking({{ $p->id_pemesanan }}); return false;">Edit</a>
                        <form method="POST" action="/pemesanan/{{ $p->id_pemesanan }}" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete" onclick="return confirm('Delete this booking?')">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach

        </table>
        @else
        <div class="empty-state">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
            </svg>
            <h3>No Bookings Yet</h3>
            <p>Start by creating your first ticket booking</p>
        </div>
        @endif
    </div>

</div>
</div>

<!-- Add/Edit Modal -->
<div class="modal" id="bookingModal">
    <div class="modal-content">
        <div class="modal-header">
            <h2 id="modalTitle">New Booking</h2>
            <span class="close" onclick="closeModal()">&times;</span>
        </div>
        <form id="bookingForm" method="POST" action="/pemesanan">
            @csrf
            <input type="hidden" id="bookingId" name="_method" value="">
            
            <div class="form-group">
                <label>Passenger</label>
                <select name="id_penumpang" id="id_penumpang" required>
                    <option value="">Select Passenger</option>
                    @foreach($penumpang as $pass)
                    <option value="{{ $pass->id_penumpang }}">{{ $pass->nama }} ({{ $pass->email }})</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Flight</label>
                <select name="id_penerbangan" id="id_penerbangan" required>
                    <option value="">Select Flight</option>
                    @foreach($penerbangan as $flight)
                    <option value="{{ $flight->id_penerbangan }}">
                        {{ $flight->kota_asal }} → {{ $flight->kota_tujuan }} 
                        ({{ \Carbon\Carbon::parse($flight->tgl_keberangkatan)->format('d M Y') }})
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Seat Number</label>
                <input type="text" name="nomor_kursi" id="nomor_kursi" required placeholder="e.g., 12A">
            </div>

            <div class="form-group">
                <label>Total Price</label>
                <input type="number" name="total_harga" id="total_harga" required placeholder="e.g., 1500000">
            </div>

            <div class="form-group">
                <label>Booking Date</label>
                <input type="date" name="tgl_pemesanan" id="tgl_pemesanan" required>
            </div>

            <div class="form-group">
                <label>Payment Method</label>
                <select name="metode_pembayaran" id="metode_pembayaran" required>
                    <option value="">Select Payment Method</option>
                    <option value="Credit Card">Credit Card</option>
                    <option value="Transfer">Bank Transfer</option>
                    <option value="Cash">Cash</option>
                </select>
            </div>

            <div class="form-actions">
                <button type="button" class="btn btn-cancel" onclick="closeModal()">Cancel</button>
                <button type="submit" class="btn btn-primary">Save Booking</button>
            </div>
        </form>
    </div>
</div>

<script>
const bookingData = @json($pemesanan);

function openModal(mode) {
    document.getElementById('bookingModal').classList.add('show');
    if(mode === 'add') {
        document.getElementById('modalTitle').textContent = 'New Booking';
        document.getElementById('bookingForm').action = '/pemesanan';
        document.getElementById('bookingForm').reset();
        document.getElementById('bookingId').value = '';
        // Set today's date as default
        document.getElementById('tgl_pemesanan').valueAsDate = new Date();
    }
}

function editBooking(id) {
    const booking = bookingData.find(b => b.id_pemesanan == id);
    if(!booking) return;

    document.getElementById('modalTitle').textContent = 'Edit Booking';
    document.getElementById('bookingForm').action = `/pemesanan/${id}`;
    document.getElementById('bookingId').value = 'PUT';
    
    document.getElementById('id_penumpang').value = booking.id_penumpang;
    document.getElementById('id_penerbangan').value = booking.id_penerbangan;
    document.getElementById('nomor_kursi').value = booking.nomor_kursi;
    document.getElementById('total_harga').value = booking.total_harga;
    document.getElementById('tgl_pemesanan').value = booking.tgl_pemesanan;
    document.getElementById('metode_pembayaran').value = booking.metode_pembayaran;
    
    document.getElementById('bookingModal').classList.add('show');
}

function closeModal() {
    document.getElementById('bookingModal').classList.remove('show');
}

// Close modal when clicking outside
window.onclick = function(event) {
    const modal = document.getElementById('bookingModal');
    if (event.target == modal) {
        closeModal();
    }
}
</script>

</body>
</html>
