<div class="footer-container container navbar-fixed-bottom">
    <div class="text-center">
        <ul class="social-network social-circle">
            @foreach($links as $link)
            <li><a href="{{ $link->href }}" class="ico{{ $link->title }}" title="{{ $link->title }}"><i class="fa fa-{{ $link->name }}"></i></a></li>
            @endforeach

        </ul>
    </div>
</div>