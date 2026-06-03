@extends('layout.index')
@section('main')
<!-- section featured -->
<style>
        .span3 {
            flex: 1 1 calc(25% - 20px);
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
        }
        .item {
            border-bottom: 1px solid #ddd;
        }
        .text {
            padding: 15px;
        }
        .meta-post ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            gap: 10px;
        }
        .meta-post ul li {
            display: inline;
        }
        .btn-download {
            display: inline-block;
            padding: 8px 16px;
            background-color: pink;
            color: black;
            border-radius: 30px;
            text-align: center;
            text-decoration: none;
        }
        .pagination {
            margin-top: 20px;
            text-align: center;
        }
        .bg-blue-500 {
            background-color: #06B6D4;
        }
        .text-white {
            color: #fff;
        }
        .p-3 {
            padding: 1rem;
        }
        .rounded {
            border-radius: 0.25rem;
        }
        .shadow-sm {
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
        }
        .text-center {
            text-align: center;
        }
         .text-content {
            text-align: justify; /* Maintain text alignment as justified */
            white-space: nowrap; /* Prevent line breaks within text */
            overflow: hidden; /* Hide text that overflows the container */
            text-overflow: ellipsis; /* Add ellipsis (...) for overflow text */
            margin: 0; /* Remove default margins */
        }

        .read-more {
            display: block; /* Ensure "Read More" is on a new line */
            color: #06B6D4; /* Link color */
            text-decoration: none; /* Remove underline from the link */
            font-weight: bold; /* Bold text for emphasis */
            margin-top: 10px; /* Space between text and link */
            font-size: 14px; /* Adjust font size as needed */
        }

        .read-more:hover {
            text-decoration: underline; /* Underline on hover */
        }
    </style>
<section id="featured">
    <!-- slideshow start here -->
    <div class="camera_wrap" id="camera-slide">
        <!-- slide 1 here -->
        <div data-src="{{asset('img/slides/camera/slide1/img1.jpg')}}">
            <div class="camera_caption fadeFromLeft">
                <div class="container">
                    <div class="row">
                        <div class="span6">
                            <h2 class="animated fadeInDown"><strong>Lembaga Penelitian dan Pengabdian kepada Masyarakat (LPPM) <span class="colored"></span></strong></h2>
                            <strong>
                                <p class="animated fadeInUp" style="color: blue; font-size: large;">Universitas Sugeng Hartono</p>
                            </strong>
                        </div>
                        <div class="span6">
                            <img src="{{asset('img/slides/camera/slide1/itsk.jpg')}}" alt="" class="animated bounceInDown delay1" />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- slide 2 here -->
        <div data-src="{{asset('img/slides/camera/slide2/img1.jpg')}}">
            <div class="camera_caption fadeFromLeft">
                <div class="container">
                    <div class="row">
                        <div class="span6">
                            <h2 class="animated fadeInDown"><strong>Lembaga Penelitian dan Pengabdian kepada Masyarakat (LPPM) <span class="colored"></span></strong></h2>
                            <strong>
                                <p class="animated fadeInUp" style="color: blue; font-size: large;">Universitas Sugeng Hartono</p>
                            </strong>
                        </div>
                        <div class="span6">
                            <img src="{{asset('img/slides/camera/slide1/itsk2.jpg')}}" alt="" class="animated bounceInDown delay1" />
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- slide 3 here
  <div data-src="img/slides/camera/slide2/img1.jpg">
    <div class="camera_caption fadeFromLeft">
      <div class="container">
        <div class="row">
          <div class="span12 aligncenter">
            <h2 class="animated fadeInDown"><strong><span class="colored">Responsive</span> and <span class="colored">cross broswer</span> compatibility</strong></h2>
            <p class="animated fadeInUp">Pellentesque habitant morbi tristique senectus et netus et malesuada</p>
            <img src="img/slides/camera/slide1/itsk.jpg" alt="" class="animated bounceInDown delay1" />
          </div>
        </div>
      </div>
    </div>
  </div> -->

    </div>

    <!-- slideshow end here -->

</section>
<!-- /section featured -->
<section id="works">
    <div class="container">
        <div class="row">
            <div class="span12">
                <h4 class="title">Recent <strong>Works</strong></h4>
                <div class="row">
                    <div class="grid cs-style-4">
                    @forelse ($pengumuman as $item)
                    <div class="span3">
                        <div class="item">
                            <figure>
                                <div>
                                    <center>
                                        @if(!empty($item->gambar))
                                            <img src="{{ asset('foto-pengumuman/' . $item->gambar) }}" width="200" height="150" alt="Tidak ada gambar" />
                                        @else
                                            <img src="{{ asset('foto-pengumuman/20240830071431.png') }}" width="200" height="150" alt="Default Image" />
                                        @endif
                                    </center>
                                </div>
                                <figcaption>
                                    <div>
                                        <span>
                                            <a href="{{ asset('foto-pengumuman/'. $item->gambar) }}" data-pretty="prettyPhoto[gallery1]" title="{{ $item->isi }}"><i class="icon-plus icon-circled icon-bglight icon-2x"></i></a>
                                        </span>
                                        <span>
                                            <a href="{{ asset('file-pengumuman/'. $item->file) }}"><i class="icon-file icon-circled icon-bglight icon-2x"></i></a>
                                        </span>
                                    </div>
                                </figcaption>
                            </figure>
                        </div>
                        <div class="text">
                            <strong>
                                <p>{{ $item->judul }}</p>
                            </strong>
                            <div class="meta-post">
                                <ul>
                                    <li><i class="icon-file"></i></li>
                                    <li>Oleh <a href="#" class="author" style="color: blue;">{{ $item->pengirim }}</a></li>
                                    <li>Pada <a href="#" class="date" style="color: blue;">{{ $item->tanggal }}</a></li>
                                </ul>
                            </div>
                            <p class="text-content">
                                {{ $item->isi }}
                                <a href="/indexpengumuman" class="read-more">Read More</a>
                            </p>
                        </div>
                    </div>
                    @empty
                    <div class="span3">
                        <div class="text bg-blue-500 text-white p-3 rounded shadow-sm text-center">
                            Data Belum Tersedia!
                        </div>
                    </div>
                    @endforelse
                </div>
                    
                    <!-- Pagination -->
                    <div class="pagination">
                        {{ $pengumuman->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection