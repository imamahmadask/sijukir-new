<div>
    <div class="px-5 h-max mb-4">
        <x-toast :message="session('success')" />

        <!-- Breadcrumb -->
        <nav class="mt-3 mb-5 flex px-5 py-3 text-gray-700 border border-gray-200 rounded-lg bg-white dark:bg-gray-800 dark:border-gray-700 shadow-sm"
            aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('dashboard.index') }}"
                        class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                        <svg class="w-3 h-3 mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                        </svg>
                        Home
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <a href="{{ route('lokasi.index') }}"
                            class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">
                            Lokasi
                        </a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="ml-1 text-sm font-medium text-blue-500 md:ml-2 dark:text-blue-400">
                            Detail Lokasi</span>
                    </div>
                </li>
            </ol>
        </nav>

        @if ($lokasi->is_active == 1)
            <span
                class="bg-green-100 text-green-800 text-lg font-semibold me-2 px-2.5 py-0.5 rounded dark:bg-green-200 dark:text-green-800 ms-2">
                Active
            </span>
        @elseif(!$lokasi->is_active)
            <span
                class="bg-orange-100 text-orange-800 text-lg font-semibold me-2 px-2.5 py-0.5 rounded dark:bg-orange-200 dark:text-orange-800 ms-2">
                Non-Active
            </span>
        @endif

        <h1 class="mb-10 mt-5 text-3xl font-extrabold text-gray-900 dark:text-white md:text-5xl lg:text-6xl">
            <span class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">
                {{ $lokasi->titik_parkir }}
            </span>
            -
            {{ $lokasi->lokasi_parkir }}
        </h1>

        <div class="flex flex-wrap">
            {{-- Image --}}
            <div class="w-full lg:w-1/2 p-4">
                <img class="relative h-auto w-full shadow-xl dark:shadow-gray-800" src="/storage/{{ $lokasi->gambar }}"
                    alt="Gambar Lokasi">
            </div>

            {{-- Frame Maps --}}
            <div class="w-full lg:w-1/2 p-4">
                <div id="map"></div>
            </div>
        </div>

        <div class="flex flex-wrap mt-2">
            {{-- List 1 --}}
            <div class="w-full lg:w-1/2 lg:p-4">
                <dl class="max-w-md text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">
                    <div class="flex flex-col pt-3">
                        <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Tanggal Registrasi</dt>
                        <dd class="text-lg font-semibold">{{ $lokasi->tgl_registrasi }}</dd>
                    </div>
                    <div class="flex flex-col pt-3">
                        <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Jenis Lokasi</dt>
                        <dd class="text-lg font-semibold">{{ $lokasi->jenis_lokasi }}</dd>
                    </div>
                    <div class="flex flex-col pt-3">
                        <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Kategori</dt>
                        <dd class="text-lg font-semibold">{{ $lokasi->kategori }}</dd>
                    </div>
                    <div class="flex flex-col pt-3">
                        <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Waktu Operasional</dt>
                        <dd class="text-lg font-semibold">{{ $lokasi->waktu_pelayanan }}</dd>
                    </div>
                    <div class="flex flex-col py-3">
                        <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Sisi</dt>
                        <dd class="text-lg font-semibold">{{ $lokasi->sisi }}</dd>
                    </div>
                    <div class="flex flex-col pt-3">
                        <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Panjang/Luas</dt>
                        <dd class="text-lg font-semibold">{{ $lokasi->panjang_luas }}</dd>
                    </div>
                </dl>
            </div>

            {{-- List 2 --}}
            <div class="w-full lg:w-1/2 lg:p-4">
                <dl class="max-w-md text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">
                    <div class="flex flex-col pt-3">
                        <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Kel./Kec.</dt>
                        <dd class="text-lg font-semibold">{{ $lokasi->kelurahan->kelurahan }} /
                            {{ $lokasi->area->Kecamatan }}</dd>
                    </div>
                    <div class="flex flex-col pt-3">
                        <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Jenis Pendaftaran</dt>
                        <dd class="text-lg font-semibold">{{ $lokasi->pendaftaran }}</dd>
                    </div>
                    <div class="flex flex-col pt-3">
                        <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Korlap</dt>
                        <dd class="text-lg font-semibold">{{ $lokasi->korlap->nama }}</dd>
                    </div>
                    <div class="flex flex-col pt-3">
                        <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Dasar Ketetapan</dt>
                        <dd class="text-lg font-semibold">
                            {{ $lokasi->dasar_ketetapan }}/{{ $lokasi->no_ketetapan }}/{{ $lokasi->tgl_ketetapan }}
                        </dd>
                    </div>
                    <div class="flex flex-col pt-3">
                        <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Google Maps</dt>
                        <dd class="text-lg font-semibold">
                            <a href="{{ $lokasi->google_maps }}">
                                Lihat Maps
                            </a>
                        </dd>
                    </div>
                    <div class="flex flex-col pt-3">
                        <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Latitude, Longitude</dt>
                        <dd class="text-lg font-semibold">
                            {{ $lokasi->kord_lat }}, {{ $lokasi->kord_long }}</dd>
                    </div>
                </dl>
            </div>
        </div>

        <hr class="my-5">

        <h3 class="text-3xl font-bold dark:text-white mb-3">Juru Parkir</h3>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-100">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Juru Utama
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Kode Jukir
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Ket. Jukir
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Jukir Pembantu
                        </th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($lokasi->jukir as $jukir)
                        <tr
                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <a href="/admin/jukir/{{ $jukir->id }}" class="hover:text-purple-600"
                                    target="_blank">
                                    {{ $jukir->nama_jukir }}
                                </a>
                            </th>
                            <td class="px-6 py-4 dark:text-white">
                                @if ($jukir->status == 'Non-Tunai')
                                    {{ $jukir->merchant->merchant_name }}
                                @else
                                    {{ $jukir->kode_jukir }}
                                @endif
                            </td>
                            <td class="px-6 py-4 dark:text-white">
                                {{ $jukir->ket_jukir }}
                            </td>
                            <td class="px-6 py-4 dark:text-white">
                                Tidak Ada
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var successToast = document.getElementById('toast-success');

        function closeToast(toastElement) {
            if (toastElement) {
                toastElement.style.display = 'none';
            }
        }

        if (successToast) {
            setTimeout(function() {
                closeToast(successToast);
            }, 3000);
        }
    });
</script>

<script>
    // Initialize and add the map
    let map;

    async function initMap() {
        // The location of Uluru
        const position = {
            lat: -25.344,
            lng: 131.031
        };
        // Request needed libraries.
        //@ts-ignore
        const {
            Map
        } = await google.maps.importLibrary("maps");
        const {
            AdvancedMarkerElement
        } = await google.maps.importLibrary("marker");

        // The map, centered at Uluru
        map = new Map(document.getElementById("map"), {
            zoom: 4,
            center: position,
            mapId: "DEMO_MAP_ID",
        });

        // The marker, positioned at Uluru
        const marker = new AdvancedMarkerElement({
            map: map,
            position: position,
            title: "Uluru",
        });
    }

    document.addEventListener("DOMContentLoaded", initMap);
</script>
<script>
    (g => {
        var h, a, k, p = "The Google Maps JavaScript API",
            c = "google",
            l = "importLibrary",
            q = "__ib__",
            m = document,
            b = window;
        b = b[c] || (b[c] = {});
        var d = b.maps || (b.maps = {}),
            r = new Set,
            e = new URLSearchParams,
            u = () => h || (h = new Promise(async (f, n) => {
                await (a = m.createElement("script"));
                e.set("libraries", [...r] + "");
                for (k in g) e.set(k.replace(/[A-Z]/g, t => "_" + t[0].toLowerCase()), g[k]);
                e.set("callback", c + ".maps." + q);
                a.src = `https://maps.${c}apis.com/maps/api/js?` + e;
                d[q] = f;
                a.onerror = () => h = n(Error(p + " could not load."));
                a.nonce = m.querySelector("script[nonce]")?.nonce || "";
                m.head.append(a)
            }));
        d[l] ? console.warn(p + " only loads once. Ignoring:", g) : d[l] = (f, ...n) => r.add(f) && u().then(() =>
            d[l](f, ...n))
    })
    ({
        key: "AIzaSyD-28lYRlFJLK4qZZqj3DzddgryZ1zYac8",
        v: "weekly"
    });
</script>
