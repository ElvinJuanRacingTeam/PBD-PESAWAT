<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Flight Schedule - Ayo Terbang</title>

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
.badge-economy{background:#dbeafe;color:#1e40af;}
.badge-business{background:#fef3c7;color:#92400e;}
.badge-first{background:#fce7f3;color:#831843;}
.actions{display:flex;gap:8px;}

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
            <a href="/penerbangan" class="active">Flight Schedule</a>
            <a href="/pemesanan">Ticket Bookings</a>
            <a href="/soal1">Query Tugas</a>
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
        <h1>✈️ Flight Schedule</h1>
        <a href="#" class="btn btn-primary" onclick="openModal('add'); return false;">+ Add New Flight</a>
    </div>

    <div class="section">
        @if($penerbangan->count() > 0)
        <table>
            <tr>
                <th>Flight ID</th>
                <th>Route</th>
                <th>Departure</th>
                <th>Departure Time</th>
                <th>Arrival Time</th>
                <th>Gate</th>
                <th>Class</th>
                <th>Airline</th>
                <th>Actions</th>
            </tr>

            @foreach($penerbangan as $p)
            <tr>
                <td><strong>#FL-{{ $p->id_penerbangan }}</strong></td>
                <td>{{ $p->kota_asal }} → {{ $p->kota_tujuan }}</td>
                <td>{{ \Carbon\Carbon::parse($p->tgl_keberangkatan)->format('d M Y') }}</td>
                <td>{{ $p->waktu_keberangkatan }}</td>
                <td>{{ $p->waktu_tiba }}</td>
                <td>{{ $p->gerbang }}</td>
                <td>
                    @if($p->kelas == 'Economy')
                    <span class="badge badge-economy">Economy</span>
                    @elseif($p->kelas == 'Business')
                    <span class="badge badge-business">Business</span>
                    @else
                    <span class="badge badge-first">First Class</span>
                    @endif
                </td>
                <td>{{ $p->maskapai }}</td>
                <td>
                    <div class="actions">
                        <a href="#" class="btn btn-edit" onclick="editFlight({{ $p->id_penerbangan }}); return false;">Edit</a>
                        <form method="POST" action="/penerbangan/{{ $p->id_penerbangan }}" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete" onclick="return confirm('Delete this flight?')">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach

        </table>
        @else
        <div class="empty-state">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h18M3 9h18M3 15h18M3 21h18" />
            </svg>
            <h3>No Flights Yet</h3>
            <p>Start by adding your first flight schedule</p>
        </div>
        @endif
    </div>

</div>
</div>

<!-- Add/Edit Modal -->
<div class="modal" id="flightModal">
    <div class="modal-content">
        <div class="modal-header">
            <h2 id="modalTitle">Add New Flight</h2>
            <span class="close" onclick="closeModal()">&times;</span>
        </div>
        <form id="flightForm" method="POST" action="/penerbangan">
            @csrf
            <input type="hidden" id="flightId" name="_method" value="">
            
            <div class="form-group">
                <label>Origin City</label>
                <input type="text" name="kota_asal" id="kota_asal" required placeholder="e.g., Jakarta">
            </div>

            <div class="form-group">
                <label>Destination City</label>
                <input type="text" name="kota_tujuan" id="kota_tujuan" required placeholder="e.g., Bali">
            </div>

            <div class="form-group">
                <label>Departure Date</label>
                <input type="date" name="tgl_keberangkatan" id="tgl_keberangkatan" required>
            </div>

            <div class="form-group">
                <label>Departure Time</label>
                <input type="time" name="waktu_keberangkatan" id="waktu_keberangkatan" required>
            </div>

            <div class="form-group">
                <label>Arrival Time</label>
                <input type="time" name="waktu_tiba" id="waktu_tiba" required>
            </div>

            <div class="form-group">
                <label>Gate</label>
                <input type="text" name="gerbang" id="gerbang" required placeholder="e.g., A12">
            </div>

            <div class="form-group">
                <label>Class</label>
                <select name="kelas" id="kelas" required>
                    <option value="">Select Class</option>
                    <option value="Economy">Economy</option>
                    <option value="Business">Business</option>
                    <option value="First Class">First Class</option>
                </select>
            </div>

            <div class="form-group">
                <label>Airline</label>
                <input type="text" name="maskapai" id="maskapai" required placeholder="e.g., Garuda Indonesia">
            </div>

            <div class="form-actions">
                <button type="button" class="btn btn-cancel" onclick="closeModal()">Cancel</button>
                <button type="submit" class="btn btn-primary">Save Flight</button>
            </div>
        </form>
    </div>
</div>

<script>
const flightData = @json($penerbangan);

function openModal(mode) {
    document.getElementById('flightModal').classList.add('show');
    if(mode === 'add') {
        document.getElementById('modalTitle').textContent = 'Add New Flight';
        document.getElementById('flightForm').action = '/penerbangan';
        document.getElementById('flightForm').reset();
        document.getElementById('flightId').value = '';
    }
}

function editFlight(id) {
    const flight = flightData.find(f => f.id_penerbangan == id);
    if(!flight) return;

    document.getElementById('modalTitle').textContent = 'Edit Flight';
    document.getElementById('flightForm').action = `/penerbangan/${id}`;
    document.getElementById('flightId').value = 'PUT';
    
    document.getElementById('kota_asal').value = flight.kota_asal;
    document.getElementById('kota_tujuan').value = flight.kota_tujuan;
    document.getElementById('tgl_keberangkatan').value = flight.tgl_keberangkatan;
    document.getElementById('waktu_keberangkatan').value = flight.waktu_keberangkatan;
    document.getElementById('waktu_tiba').value = flight.waktu_tiba;
    document.getElementById('gerbang').value = flight.gerbang;
    document.getElementById('kelas').value = flight.kelas;
    document.getElementById('maskapai').value = flight.maskapai;
    
    document.getElementById('flightModal').classList.add('show');
}

function closeModal() {
    document.getElementById('flightModal').classList.remove('show');
}

// Close modal when clicking outside
window.onclick = function(event) {
    const modal = document.getElementById('flightModal');
    if (event.target == modal) {
        closeModal();
    }
}
</script>

</body>
</html>
