@role('Super_Usuario')
	<li class="{{request()->is('home') ? 'active' : ''}}">
	    <a href="{{ url('home') }}">
	        <i class="material-icons">home</i>
	        <span>Inicio</span>
	    </a>
	</li>
	<li class="{{request()->is('usuario') ? 'active' : ''}}">
	    <a href="{{ route('usuario.index') }}">
	        <i class="material-icons">person</i>
	        <span>Usuarios</span>
	    </a>
	</li>
	<!-- <li class="{{request()->is('roles') ? 'active' : ''}}">
	    <a href="{{ route('roles.index') }}">
	        <i class="material-icons">build</i>
	        <span>Roles y Permisos</span>
	    </a>
	</li> -->
	<li class="{{request()->is('roles') ? 'active' : ''}}
		{{request()->is('roles/*') ? 'active' : ''}}
		{{request()->is('permisos') ? 'active' : ''}}
	    {{request()->is('permisos/*') ? 'active' : ''}}">
	    <a href="javascript:void(0);" class="menu-toggle">
	        <i class="material-icons">build</i>
	        <span>Roles y Permisos</span>
	    </a>
	    <ul class="ml-menu ">
	        <li class="{{request()->is('roles') ? 'active' : ''}}
	        	{{request()->is('roles/*') ? 'active' : ''}}">
	            <a href="{{ route('roles.index') }}">
	                <span>Roles</span>
	            </a>
	        </li>
	        <li class="{{request()->is('permisos') ? 'active' : ''}}
	        	{{request()->is('permisos/*') ? 'active' : ''}}">
	            <a href="{{ route('permisos.index') }}">
	                <span>Permisos</span>
	            </a>
	        </li>
	    </ul>
	</li>
	<li class="{{request()->is('pagos') ? 'active' : ''}}">
	    <a href="{{ route('pagos.index') }}">
	        <i class="material-icons">account_balance</i>
	        <span>Empresas</span>
	    </a>
	</li>
@endrole

@role('AdministradorA')
	<li class="{{request()->is('home') ? 'active' : ''}}">
	    <a href="{{ url('home') }}">
	        <i class="material-icons">home</i>
	        <span>Inicio</span>
	    </a>
	</li>

	<!-- <li class="{{request()->is('roles') ? 'active' : ''}}">
	    <a href="{{ route('roles.index') }}">
	        <i class="material-icons">build</i>
	        <span>Roles y Permisos</span>
	    </a>
	</li> -->
<li class="{{request()->is('empresa/*') ? 'active' : ''}}
    {{request()->is('permisos/*') ? 'active' : ''}}
    {{request()->is('usuario') ? 'active' : ''}}
    {{request()->is('clientes') ? 'active' : ''}}
    {{request()->is('clientes/*') ? 'active' : ''}}
 ">
    <a href="javascript:void(0);" class="menu-toggle">
        <i class="material-icons">account_balance</i>
        <span>Empresas</span>
    </a>
    <ul class="ml-menu ">
        <li class="{{request()->is('empresa/*/edit') ? 'active' : ''}}">
            <a href="{{ route('empresa.edit',auth()->user()->empresa_id) }}">
                <span>Editar</span>
            </a>
        </li>
        <li class="{{request()->is('usuario') ? 'active' : ''}}
        	{{request()->is('usuario/*') ? 'active' : ''}}
        	{{request()->is('clientes/*') ? 'active' : ''}}">
            <a href="{{ route('usuario.index') }}">
                <span>Clientes</span>
            </a>
        </li>
    </ul>
</li>
<li class="{{request()->is('tareas/*') ? 'active' : ''}}
		   {{request()->is('articulo/*') ? 'active' : ''}}">
	    <a href="{{ route('tareas.show',Auth::user()->empresa_id) }}">
	        <i class="material-icons">work</i>
	        <span>Trabajos</span>
	    </a>
	</li>
@endrole

<!-- --------------------------------Ejemplo multinivel------------------------ -->
<!-- <li>
    <a href="javascript:void(0);" class="menu-toggle">
        <i class="material-icons">trending_down</i>
        <span>Multi Level Menu</span>
    </a>
    <ul class="ml-menu">
        <li>
            <a href="javascript:void(0);">
                <span>Menu Item</span>
            </a>
        </li>
        <li>
            <a href="javascript:void(0);">
                <span>Menu Item - 2</span>
            </a>
        </li>
        <li>
            <a href="javascript:void(0);" class="menu-toggle">
                <span>Level - 2</span>
            </a>
            <ul class="ml-menu">
                <li>
                    <a href="javascript:void(0);">
                        <span>Menu Item</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <span>Level - 3</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="javascript:void(0);">
                                <span>Level - 4</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
    </ul>
</li> -->