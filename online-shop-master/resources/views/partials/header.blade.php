

<header id="header"><!--header-->

	<div class="navbar navbar-default navbar-static-top navbar-fixed-top" id="navbar-default">
		<div class="container rgba_black_3">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#responsive-menu">
					<span class="sr-only">Open Navi</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>

				<div class="container-fluid">
					<div class="navbar-header">
						<a class="navbar-brand" href="{{ route('shop.index') }}">
							<img alt="Brand" src="{{URL::to('uploads/logo.png')}}" style="height: 75px;" class="img-responsive">
						</a>
					</div>
				</div>
			</div>
			<div class="navbar-collapse collapse" id="responsive-menu">
				<ul class="nav navbar-nav">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Каталог <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="{{ route('product.all') }}">Все товары</a></li>
							@foreach($categories->chunk(2) as $categoryChunk)
								<li class="divider"></li>
								@foreach($categoryChunk as $category)
									<li><a href="{{ route('product.index', ['name' => $category->name]) }}">{{ $category->title }}</a></li>
								@endforeach

							@endforeach

						</ul>
					</li>
					<li class="dropdown" id="menu">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Меню <b class="caret"></b></a>
						<ul class="dropdown-menu">
							@foreach($blocks as $block)
								<li><a href="../#{{ $block->name }}">{{ $block->title }}</a></li>
							@endforeach
						</ul>
					</li>
					<li>
						<a href="{{ route('product.shoppingCart') }}"><i class="fa fa-shopping-cart" aria-hidden="true">
							</i> Корзина
							@if(Session::has('cart') )
								@if(Session::get('cart')->totalPrice != 0)
								<span class="badge">{{ Session::get('cart')->totalQty }}</span>
								@endif
								@endif
						</a>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">User <b class="caret"></b></a>
						<ul class="dropdown-menu">
							@if(Auth::guard('api')->check())
								<li><a href="{{ route('user.profile') }}">User Profile</a></li>
								<li class="divider"></li>
								<li><a href="{{ route('user.logout') }}">Logout</a></li>
							@else
								<li><a href="{{ route('user.signup') }}">Signup</a></li>
								<li><a href="{{ route('user.signin') }}">Signin</a></li>
							@endif


						</ul>
					</li>
				</ul>

			<form class="navbar-form navbar-right" action="{{ route('search') }}" method="post">
				{{ Form::token() }}
				<div class="input-group">
						<input type="text" class="form-control" placeholder="Поиск" name="keyword" id="keyword">
						<div class="input-group-btn">
							<button  class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
						</div>
					</div>
				{{ csrf_field() }}
			</form>

			</div>
		</div>
	</div>
</header><!--/header-->