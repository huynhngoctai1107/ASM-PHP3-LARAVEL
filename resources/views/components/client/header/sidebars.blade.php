
<ul class="list-group">

    <li class="list-group-item d-flex justify-content-between align-items-center">
        <a class="nav-link text-capitalize" style="color:#555555" href="/blog">Tất Cả Bài Viết</a>
     </li>
    @foreach($category as $item)

    <li class="list-group-item d-flex justify-content-between align-items-center">
        <a class="nav-link text-capitalize" style="color:#555555" href="/blog/danh-muc/{{$item->slug}}">{{$item->name}}</a>
        <span class="badge badge-primary badge-pill">{{$item->quantity}}</span>
    </li>
    @endforeach

</ul>
