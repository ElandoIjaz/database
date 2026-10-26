<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pesanan - Tokoku Admin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #059669;
            --primary-hover: #047857;
            --primary-light: #ecfdf5;
            --surface: #ffffff;
            --background: #f8fafc;
            --text-main: #0f172a;
            --text-muted: #64748b;
            --border: #e2e8f0;
            --status-diproses-bg: #eff6ff;
            --status-diproses-text: #1d4ed8;
            --status-dikirim-bg: #fffbeb;
            --status-dikirim-text: #b45309;
            --status-selesai-bg: #f0fdf4;
            --status-selesai-text: #15803d;
            --status-dibatalkan-bg: #fef2f2;
            --status-dibatalkan-text: #b91c1c;
            --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
            --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1);
            --radius-md: 10px;
            --radius-lg: 16px;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
            background-color: var(--background);
            color: var(--text-main);
            line-height: 1.5;
            padding: 32px 16px;
        }

        .container {
            max-width: 1100px;
            margin: 0 auto;
        }

        .header {
            margin-bottom: 28px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 16px;
        }

        .title-group h1 {
            font-size: 26px;
            font-weight: 800;
            color: var(--text-main);
            letter-spacing: -0.02em;
        }

        .title-group p {
            color: var(--text-muted);
            font-size: 14px;
            margin-top: 4px;
        }

        .nav-actions {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .nav-btn {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            padding: 8px 16px;
            border-radius: var(--radius-md);
            background: var(--primary-light);
            transition: all 0.2s ease;
            border: 1px solid #a7f3d0;
        }

        .nav-btn:hover {
            background: #d1fae5;
        }

        .nav-btn-secondary {
            color: var(--text-muted);
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            padding: 8px 16px;
            border-radius: var(--radius-md);
            background: #f1f5f9;
            transition: all 0.2s ease;
        }

        .nav-btn-secondary:hover {
            background: #e2e8f0;
            color: var(--text-main);
        }

        /* Filter Card */
        .filter-card {
            background: var(--surface);
            border-radius: var(--radius-lg);
            padding: 24px;
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--border);
            margin-bottom: 24px;
        }

        .filter-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 16px;
            flex-wrap: wrap;
            gap: 8px;
        }

        .filter-header h2 {
            font-size: 16px;
            font-weight: 700;
            color: var(--text-main);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .filter-form {
            display: grid;
            grid-template-columns: 1.5fr 1.5fr 1.5fr auto;
            gap: 16px;
            align-items: end;
        }

        @media (max-width: 860px) {
            .filter-form {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 580px) {
            .filter-form {
                grid-template-columns: 1fr;
            }
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .form-group label {
            font-size: 13px;
            font-weight: 600;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.04em;
        }

        .form-control {
            width: 100%;
            padding: 10px 14px;
            font-size: 14px;
            font-family: inherit;
            border: 1px solid var(--border);
            border-radius: var(--radius-md);
            background: #fff;
            color: var(--text-main);
            outline: none;
            transition: border-color 0.15s ease, box-shadow 0.15s ease;
        }

        .form-control:focus {
            border-color: #34d399;
            box-shadow: 0 0 0 3px rgba(5, 150, 105, 0.15);
        }

        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 8px;
            height: 42px;
            font-size: 14px;
            font-weight: 500;
        }

        .checkbox-group input[type="checkbox"] {
            width: 18px;
            height: 18px;
            accent-color: var(--primary);
            cursor: pointer;
        }

        .button-group {
            display: flex;
            gap: 8px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 10px 18px;
            font-size: 14px;
            font-weight: 600;
            border-radius: var(--radius-md);
            cursor: pointer;
            border: none;
            transition: all 0.2s ease;
            text-decoration: none;
        }

        .btn-primary {
            background-color: var(--primary);
            color: #ffffff;
            box-shadow: 0 2px 4px rgba(5, 150, 105, 0.25);
        }

        .btn-primary:hover {
            background-color: var(--primary-hover);
        }

        .btn-secondary {
            background-color: #f1f5f9;
            color: var(--text-muted);
        }

        .btn-secondary:hover {
            background-color: #e2e8f0;
            color: var(--text-main);
        }

        /* Banner Info */
        .info-banner {
            background: #f0fdf4;
            border: 1px solid #bbf7d0;
            border-radius: var(--radius-md);
            padding: 12px 16px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 12px;
            font-size: 13.5px;
            color: #166534;
        }

        .badge-pill {
            display: inline-block;
            padding: 3px 10px;
            background: #dcfce7;
            color: #15803d;
            font-size: 12px;
            font-weight: 700;
            border-radius: 9999px;
            margin-right: 4px;
        }

        /* Table Card */
        .table-card {
            background: var(--surface);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--border);
            overflow: hidden;
        }

        .table-responsive {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
            font-size: 14px;
        }

        th {
            background-color: #f8fafc;
            padding: 14px 18px;
            font-weight: 700;
            color: var(--text-muted);
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            border-bottom: 1px solid var(--border);
        }

        td {
            padding: 16px 18px;
            border-bottom: 1px solid var(--border);
            color: var(--text-main);
            vertical-align: middle;
        }

        tr:last-child td {
            border-bottom: none;
        }

        tbody tr:hover {
            background-color: #fbfcfe;
        }

        /* Status Badges */
        .badge-status {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 9999px;
            font-size: 12px;
            font-weight: 700;
            text-transform: capitalize;
        }

        .badge-status.diproses {
            background-color: var(--status-diproses-bg);
            color: var(--status-diproses-text);
        }

        .badge-status.dikirim {
            background-color: var(--status-dikirim-bg);
            color: var(--status-dikirim-text);
        }

        .badge-status.selesai {
            background-color: var(--status-selesai-bg);
            color: var(--status-selesai-text);
        }

        .badge-status.dibatalkan {
            background-color: var(--status-dibatalkan-bg);
            color: var(--status-dibatalkan-text);
        }

        .catatan-text {
            background: #fffbeb;
            border: 1px solid #fef3c7;
            padding: 6px 12px;
            border-radius: 6px;
            color: #92400e;
            font-size: 13px;
            display: inline-block;
        }

        .catatan-empty {
            color: #94a3b8;
            font-style: italic;
            font-size: 13px;
        }

        .empty-state {
            padding: 48px 16px;
            text-align: center;
            color: var(--text-muted);
        }
    </style>
</head>
<body>

    <div class="container">
        <!-- Header -->
        <header class="header">
            <div class="title-group">
                <h1>{{ $isAdminView ? 'Pencarian Admin: Pesanan Aktif' : 'Daftar Pesanan Tokoku' }}</h1>
                <p>
                    @if($isAdminView)
                        Menampilkan pesanan aktif (diproses / dikirim) sejak 10 Oktober 2025 dengan catatan (kolom: id, tanggal_pesan, status, catatan).
                    @else
                        Daftar seluruh pesanan pelanggan beserta relasi data produk.
                    @endif
                </p>
            </div>
            <div class="nav-actions">
                @if($isAdminView)
                    <a href="{{ route('pesanan.index') }}" class="nav-btn-secondary">&larr; Semua Pesanan</a>
                @else
                    <a href="{{ route('admin.pesanan') }}" class="nav-btn">⚡ Mode Pencarian Admin</a>
                @endif
                <a href="{{ route('produk.index') }}" class="nav-btn-secondary">Katalog Produk &rarr;</a>
            </div>
        </header>

        <!-- Admin Filter Card -->
        <div class="filter-card">
            <div class="filter-header">
                <h2>🔍 Parameter Pencarian Admin</h2>
                @if(!$isAdminView)
                    <span style="font-size: 13px; color: var(--text-muted);">Klik "Terapkan Filter" untuk menyaring sesuai kriteria admin</span>
                @endif
            </div>

            <form action="{{ route('pesanan.index') }}" method="GET" class="filter-form">
                <input type="hidden" name="admin_filter" value="1">

                <!-- Tanggal Dibuat Sejak -->
                <div class="form-group">
                    <label for="sejak">Dibuat Sejak (Inklusif)</label>
                    <input 
                        type="date" 
                        name="sejak" 
                        id="sejak" 
                        class="form-control" 
                        value="{{ $sejakTanggal ?? '2025-10-10' }}"
                        required
                    >
                </div>

                <!-- Status Filter -->
                <div class="form-group">
                    <label>Status Aktif</label>
                    <div style="display: flex; gap: 14px; align-items: center; height: 42px;">
                        <label style="font-size: 13px; font-weight: 500; display: inline-flex; align-items: center; gap: 4px; cursor: pointer;">
                            <input type="checkbox" name="status[]" value="diproses" {{ in_array('diproses', (array)($statuses ?? ['diproses', 'dikirim'])) ? 'checked' : '' }}>
                            Diproses
                        </label>
                        <label style="font-size: 13px; font-weight: 500; display: inline-flex; align-items: center; gap: 4px; cursor: pointer;">
                            <input type="checkbox" name="status[]" value="dikirim" {{ in_array('dikirim', (array)($statuses ?? ['diproses', 'dikirim'])) ? 'checked' : '' }}>
                            Dikirim
                        </label>
                    </div>
                </div>

                <!-- Checkbox Hanya Catatan Tidak Kosong -->
                <div class="form-group">
                    <label>Kondisi Catatan</label>
                    <div class="checkbox-group">
                        <label style="display: inline-flex; align-items: center; gap: 6px; cursor: pointer;">
                            <input type="checkbox" name="ada_catatan" value="1" {{ !empty($hanyaAdaCatatan) ? 'checked' : '' }}>
                            Catatan tidak kosong
                        </label>
                    </div>
                </div>

                <!-- Tombol Submit -->
                <div class="button-group">
                    <button type="submit" class="btn btn-primary" id="btn-submit-filter">Terapkan Filter</button>
                    @if($isAdminView)
                        <a href="{{ route('pesanan.index') }}" class="btn btn-secondary">Reset</a>
                    @endif
                </div>
            </form>
        </div>

        @if($isAdminView)
        <!-- Info Banner untuk Kriteria Admin -->
        <div class="info-banner">
            <div>
                <strong>Kriteria Aktif:</strong>
                <span class="badge-pill">Status: {{ implode(', ', (array)$statuses) }}</span>
                <span class="badge-pill">Sejak: {{ $sejakTanggal }}</span>
                @if($hanyaAdaCatatan)
                    <span class="badge-pill">Catatan: Tidak Kosong</span>
                @endif
                <span class="badge-pill">Urutan: Tanggal ASC &rarr; ID ASC</span>
            </div>
            <div>
                Ditemukan: <strong>{{ $pesanan->count() }}</strong> pesanan
            </div>
        </div>
        @endif

        <!-- Table Card -->
        <div class="table-card">
            <div class="table-responsive">
                <table>
                    <thead>
                        @if($isAdminView)
                        {{-- Sesuai permintaan: Hanya kolom id, tanggal_pesan, status, dan catatan --}}
                        <tr>
                            <th style="width: 80px;">ID</th>
                            <th style="width: 180px;">Tanggal Pesan</th>
                            <th style="width: 150px;">Status</th>
                            <th>Catatan</th>
                        </tr>
                        @else
                        {{-- Kolom umum default --}}
                        <tr>
                            <th style="width: 70px;">ID</th>
                            <th>Nama Pelanggan</th>
                            <th>Nama Produk</th>
                            <th style="width: 90px; text-align: center;">Jumlah</th>
                            <th style="width: 140px;">Status</th>
                            <th>Catatan</th>
                        </tr>
                        @endif
                    </thead>
                    <tbody>
                        @forelse($pesanan as $p)
                        <tr>
                            @if($isAdminView)
                                {{-- Kolom Khusus Admin: id, tanggal_pesan, status, catatan --}}
                                <td><strong>#{{ $p->id }}</strong></td>
                                <td>{{ date('d M Y', strtotime($p->tanggal_pesan)) }} ({{ $p->tanggal_pesan }})</td>
                                <td>
                                    <span class="badge-status {{ strtolower($p->status) }}">
                                        {{ $p->status }}
                                    </span>
                                </td>
                                <td>
                                    @if(!empty($p->catatan))
                                        <span class="catatan-text">💬 {{ $p->catatan }}</span>
                                    @else
                                        <span class="catatan-empty">Tidak ada catatan</span>
                                    @endif
                                </td>
                            @else
                                {{-- Kolom View Umum --}}
                                <td><strong>#{{ $p->id }}</strong></td>
                                <td>{{ $p->pelanggan->nama ?? 'Tidak ada data' }}</td>
                                <td>{{ $p->produk->nama_produk ?? 'Tidak ada data' }}</td>
                                <td style="text-align: center;">{{ $p->jumlah }}</td>
                                <td>
                                    <span class="badge-status {{ strtolower($p->status) }}">
                                        {{ $p->status }}
                                    </span>
                                </td>
                                <td>{{ $p->catatan ?? '-' }}</td>
                            @endif
                        </tr>
                        @empty
                        <tr>
                            <td colspan="{{ $isAdminView ? 4 : 6 }}">
                                <div class="empty-state">
                                    <strong>Tidak ada pesanan yang sesuai dengan filter</strong>
                                    <p>Silakan sesuaikan kembali kriteria pencarian di atas.</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>