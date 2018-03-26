 <ul class="sidebar-menu">
	<li class="header">MAIN NAVIGATION</li>
	<li><a href="{{route('mobiles.index')}}"><i class="fa fa-phone"></i> <span> Телефони</span></a></li>
	<li><a href="{{route('categories.index')}}"><i class="fa fa-list-ul"></i> <span>Категорії</span></a></li>
	<li><a href="{{route('users.index')}}"><i class="fa fa-user"></i> <span>Користувачі</span></a></li>
	<li>
		<a href="{{route('orders.index')}}">
			<i class="fa fa-bell"></i>
			<span>Нові замовлення</span>
			<span class="pull-right-container">
				<small class="label pull-right bg-green">{{$newOrdersCount}}</small>
			</span>
		</a>
	</li>
	<li>
		<a href="{{route('sawOrders')}}">
			<i class="fa fa-envelope"></i>
			<span>Переглянуті замовлення</span>
			<span class="pull-right-container">
				<small class="label pull-right bg-green">{{$sawOrdersCount}}</small>
			</span>
		</a>
	</li>
	<li>
		<a href="{{route('roadOrders')}}">
			<i class="fa fa-road"></i>
			<span>Замовлення "У дорозі"</span>
			<span class="pull-right-container">
				<small class="label pull-right bg-green">{{$roadOrdersCount}}</small>
			</span>
		</a>
	</li>
	<li>
		<a href="{{route('successOrders')}}">
			<i class="fa fa-check"></i>
			<span>Виконані замовлення</span>
			<span class="pull-right-container">
				<small class="label pull-right bg-green">{{$successOrdersCount}}</small>
			</span>
		</a>
	</li>
	<li><a href="{{route('txt.index')}}"><i class="fa fa-file"></i> <span>Файли txt</span></a></li>
</ul>