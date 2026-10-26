
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Produk - Tokoku</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #4f46e5;
            --primary-hover: #4338ca;
            --primary-light: #eef2ff;
            --surface: #ffffff;
            --background: #f8fafc;
            --text-main: #0f172a;
            --text-muted: #64748b;
            --border: #e2e8f0;
            --border-focus: #818cf8;
            --success-bg: #ecfdf5;
            --success-text: #047857;
            --danger-bg: #fef2f2;
            --danger-text: #b91c1c;
            --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
            --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
            --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
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

        .nav-links a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            padding: 8px 16px;
            border-radius: var(--radius-md);
            background: var(--primary-light);
            transition: all 0.2s ease;
        }

        .nav-links a:hover {
            background: #e0e7ff;
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

        .filter-form {
            display: grid;
            grid-template-columns: 2fr 1.5fr 1.5fr auto;
            gap: 16px;
            align-items: end;
        }

        @media (max-width: 900px) {
            .filter-form {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 600px) {
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
            border-color: var(--border-focus);
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.15);
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
            box-shadow: 0 2px 4px rgba(79, 70, 229, 0.25);
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

        /* Preset Shortcut Banner */
        .preset-banner {
            margin-top: 18px;
            padding-top: 16px;
            border-top: 1px dashed var(--border);
            display: flex;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
            font-size: 13px;
            color: var(--text-muted);
        }

        .preset-chip {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 12px;
            background: #f8fafc;
            border: 1px solid #cbd5e1;
            border-radius: 9999px;
            color: var(--primary);
            font-weight: 600;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .preset-chip:hover {
            background: var(--primary-light);
            border-color: var(--primary);
        }

        /* Active Query Badges */
        .status-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 16px;
            font-size: 14px;
            color: var(--text-muted);
            flex-wrap: wrap;
            gap: 8px;
        }

        .badge-list {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .badge-pill {
            padding: 3px 10px;
            background: var(--primary-light);
            color: var(--primary);
            font-size: 12px;
            font-weight: 600;
            border-radius: 9999px;
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

        .badge-kategori {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 9999px;
            font-size: 12px;
            font-weight: 600;
            background: #f1f5f9;
            color: #475569;
        }

        .badge-kategori.elektronik {
            background: #dbeafe;
            color: #1e40af;
        }

        .badge-kategori.aksesoris {
            background: #fef3c7;
            color: #92400e;
        }

        .badge-kategori.buku {
            background: #e0e7ff;
            color: #3730a3;
        }

        .price-text {
            font-weight: 700;
            color: #059669;
            font-variant-numeric: tabular-nums;
        }

        .stock-pill {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 9999px;
            font-size: 12px;
            font-weight: 600;
        }

        .stock-available {
            background: var(--success-bg);
            color: var(--success-text);
        }

        .stock-empty {
            background: var(--danger-bg);
            color: var(--danger-text);
        }

        .empty-state {
            padding: 48px 16px;
            text-align: center;
            color: var(--text-muted);
        }

        .empty-state p {
            margin-top: 8px;
            font-size: 14px;
        }

        /* Pagination */
        .pagination-footer {
            padding: 16px 20px;
            background-color: #f8fafc;
            border-top: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 12px;
            font-size: 13px;
            color: var(--text-muted);
        }

        .pagination-nav {
            display: flex;
            gap: 6px;
            align-items: center;
        }

        .page-btn {
            min-width: 32px;
            height: 32px;
            padding: 0 8px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 6px;
            border: 1px solid var(--border);
            background: #fff;
            color: var(--text-main);
            text-decoration: none;
            font-weight: 600;
            font-size: 13px;
            transition: all 0.15s ease;
        }

        .page-btn:hover:not(.disabled):not(.active) {
            border-color: var(--primary);
            color: var(--primary);
        }

        .page-btn.active {
            background: var(--primary);
            border-color: var(--primary);
            color: #ffffff;
        }

        .page-btn.disabled {
            color: #cbd5e1;
            background: #f8fafc;
            cursor: not-allowed;
            pointer-events: none;
        }
    </style>
</head>
<body>

    <div class="container">
        <!-- Header -->
        <header class="header">
            <div class="title-group">
                <h1>Katalog Produk Tokoku</h1>
                <p>Pencarian, filter kategori, pengurutan harga termahal, dan paginasi yang aman (Prepared Statement)</p>
            </div>
            <nav class="nav-links">
                <a href="{{ route('pesanan.index') }}">Lihat Pesanan &rarr;</a>
            </nav>
        </header>

        <!-- Filter & Search Card -->
        <div class="filter-card">
            <form action="{{ route('produk.index') }}" method="GET" class="filter-form">
                <!-- Search Input -->
                <div class="form-group">
                    <label for="q">Pencarian</label>
                    <input 
                        type="text" 
                        name="q" 
                        id="q" 
                        class="form-control" 
                        placeholder="Ketik nama produk (mis. Laptop)..." 
                        value="{{ $search ?? '' }}"
                    >
                </div>

                <!-- Category Filter -->
                <div class="form-group">
                    <label for="kategori">Kategori</label>
                    <select name="kategori" id="kategori" class="form-control">
                        <option value="">-- Semua Kategori --</option>
                        @foreach($daftarKategori as $kat)
                            <option value="{{ $kat }}" {{ ($kategori ?? '') === $kat ? 'selected' : '' }}>
                                {{ $kat }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Sort Order -->
                <div class="form-group">
                    <label for="sort">Urutkan</label>
                    <select name="sort" id="sort" class="form-control">
                        <option value="harga_desc" {{ ($sort ?? '') === 'harga_desc' ? 'selected' : '' }}>Harga Termahal &darr;</option>
                        <option value="harga_asc" {{ ($sort ?? '') === 'harga_asc' ? 'selected' : '' }}>Harga Termurah &uarr;</option>
                        <option value="nama_asc" {{ ($sort ?? '') === 'nama_asc' ? 'selected' : '' }}>Nama Produk (A - Z)</option>
                        <option value="nama_desc" {{ ($sort ?? '') === 'nama_desc' ? 'selected' : '' }}>Nama Produk (Z - A)</option>
                    </select>
                </div>

                <!-- Buttons -->
                <div class="button-group">
                    <button type="submit" class="btn btn-primary" id="btn-filter">Cari</button>
                    <a href="{{ route('produk.index') }}" class="btn btn-secondary">Reset</a>
                </div>
            </form>

            <!-- Quick Preset for user prompt scenario -->
            <div class="preset-banner">
                <span> Coba skenario cepat:</span>
                <a href="{{ route('produk.index', ['q' => 'Laptop', 'kategori' => 'Elektronik', 'sort' => 'harga_desc']) }}" class="preset-chip">
                    Laptop &bull; Elektronik &bull; Termahal
                </a>
                <a href="{{ route('produk.index', ['kategori' => 'Aksesoris', 'sort' => 'harga_desc']) }}" class="preset-chip">
                    Semua Aksesoris &bull; Termahal
                </a>
            </div>
        </div>

        <!-- Status Info Bar -->
        <div class="status-bar">
            <div>
                Menampilkan <strong>{{ $produk->count() }}</strong> dari total <strong>{{ $produk->total() }}</strong> produk
            </div>
            <div class="badge-list">
                @if(!empty($search))
                    <span class="badge-pill">Cari: "{{ $search }}"</span>
                @endif
                @if(!empty($kategori))
                    <span class="badge-pill">Kategori: {{ $kategori }}</span>
                @endif
                <span class="badge-pill">
                    Urutan: {{ match($sort ?? 'harga_desc') {
                        'harga_asc' => 'Termurah',
                        'nama_asc' => 'Nama (A-Z)',
                        'nama_desc' => 'Nama (Z-A)',
                        default => 'Termahal'
                    } }}
                </span>
            </div>
        </div>

        <!-- Products Table Card -->
        <div class="table-card">
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th style="width: 70px;">ID</th>
                            <th>Nama Produk</th>
                            <th style="width: 160px;">Kategori</th>
                            <th style="width: 170px;">Harga</th>
                            <th style="width: 120px; text-align: center;">Stok</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($produk as $p)
                        <tr>
                            <td>#{{ $p->id }}</td>
                            <td>
                                <strong>{{ $p->nama_produk }}</strong>
                            </td>
                            <td>
                                <span class="badge-kategori {{ strtolower($p->kategori) }}">
                                    {{ $p->kategori }}
                                </span>
                            </td>
                            <td>
                                <span class="price-text">Rp {{ number_format($p->harga, 0, ',', '.') }}</span>
                            </td>
                            <td style="text-align: center;">
                                @if($p->stok > 0)
                                    <span class="stock-pill stock-available">{{ $p->stok }} unit</span>
                                @else
                                    <span class="stock-pill stock-empty">Habis</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5">
                                <div class="empty-state">
                                    <strong>Tidak ada produk yang cocok</strong>
                                    <p>Silakan coba kata kunci atau filter kategori lainnya.</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination Footer -->
            @if($produk->hasPages())
            <div class="pagination-footer">
                <div>
                    Halaman <strong>{{ $produk->currentPage() }}</strong> dari <strong>{{ $produk->lastPage() }}</strong>
                </div>

                <nav class="pagination-nav" aria-label="Navigasi Halaman">
                    {{-- Previous Page Link --}}
                    @if ($produk->onFirstPage())
                        <span class="page-btn disabled">&larr;</span>
                    @else
                        <a href="{{ $produk->previousPageUrl() }}" class="page-btn" rel="prev">&larr;</a>
                    @endif

                    {{-- Page Numbers --}}
                    @foreach ($produk->getUrlRange(1, $produk->lastPage()) as $pageNumber => $url)
                        @if ($pageNumber == $produk->currentPage())
                            <span class="page-btn active">{{ $pageNumber }}</span>
                        @else
                            <a href="{{ $url }}" class="page-btn">{{ $pageNumber }}</a>
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($produk->hasMorePages())
                        <a href="{{ $produk->nextPageUrl() }}" class="page-btn" rel="next">&rarr;</a>
                    @else
                        <span class="page-btn disabled">&rarr;</span>
                    @endif
                </nav>
            </div>
            @endif
        </div>
    </div>

</body>
</html>
