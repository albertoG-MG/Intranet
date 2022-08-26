<div class="container mx-auto px-6 py-8">
  <div class="flex items-center justify-center">
    <div class="grid w-11/12 md:w-9/12">
      <h3 class="text-gray-700 text-3xl font-medium">Ver usuarios</h3>
    </div>
  </div>
  <div class="mt-4">
    <div class="flex flex-col mt-8">
      <div class="flex bg-gray-200 items-center justify-center mb-32">
        <div class="grid bg-white rounded-lg shadow-xl w-11/12 md:w-9/12">
          <div class="bg-gray-50 rounded-t">
            <div class="container flex flex-col sm:flex-row items-center px-6 py-4 mx-auto overflow-y-auto whitespace-nowrap">
              <a href="dashboard.php" class="text-gray-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                  <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                </svg>
              </a>

              <span class="mx-5 rotate-90 sm:rotate-0 text-gray-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                </svg>
              </span>

			  <a href="users.php" class="flex items-center text-gray-600 -px-2 hover:underline">
                <svg class="w-6 h-6 mx-2" viewBox="0 0 24 24">
                  <path fill="currentColor" d="M12,4A4,4 0 0,1 16,8A4,4 0 0,1 12,12A4,4 0 0,1 8,8A4,4 0 0,1 12,4M12,14C16.42,14 20,15.79 20,18V20H4V18C4,15.79 7.58,14 12,14Z" />
                </svg>

                <span class="mx-2">Usuarios</span>
              </a>

              <span class="mx-5 rotate-90 sm:rotate-0 text-gray-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                </svg>
              </span>

              <a href="ver_usuario.php?idUser=<?php echo $verid; ?>" class="flex items-center text-blue-600 -px-2 hover:underline">
                <svg class="w-5 h-5" viewBox="0 0 24 24">
					<path fill="currentColor" d="M6 8C6 5.79 7.79 4 10 4S14 5.79 14 8 12.21 12 10 12 6 10.21 6 8M9.14 19.75L8.85 19L9.14 18.25C9.84 16.5 11.08 15.14 12.61 14.22C11.79 14.08 10.92 14 10 14C5.58 14 2 15.79 2 18V20H9.27C9.23 19.91 9.18 19.83 9.14 19.75M17 18C16.44 18 16 18.44 16 19S16.44 20 17 20 18 19.56 18 19 17.56 18 17 18M23 19C22.06 21.34 19.73 23 17 23S11.94 21.34 11 19C11.94 16.66 14.27 15 17 15S22.06 16.66 23 19M19.5 19C19.5 17.62 18.38 16.5 17 16.5S14.5 17.62 14.5 19 15.62 21.5 17 21.5 19.5 20.38 19.5 19Z" />
				</svg>

                <span class="mx-2">Ver Usuarios</span>
              </a>

            </div>
          </div>


          <div class="flex justify-center py-4">
            <div class="flex bg-white rounded-full md:p-4 p-2 border-2 border-black">
			  <svg class="w-8 h-8" viewBox="0 0 101.54834 113.47544" xmlns="http://www.w3.org/2000/svg">
                <g transform="translate(132.60239,47.184006)">
                  <path style="fill:#8c8c8c;fill-opacity:1;stroke-width:0.264583" d="m -132.46206,61.015239 c -0.0879,0.08792 -0.15046,-0.06835 -0.13897,-0.347265 0.0127,-0.308227 0.0754,-0.37092 0.15985,-0.159854 0.0764,0.190995 0.067,0.419201 -0.0209,0.507119 z m 101.335407,0 c -0.08792,0.08792 -0.150452,-0.06835 -0.138964,-0.347265 0.0127,-0.308227 0.07539,-0.37092 0.159851,-0.159854 0.07643,0.190995 0.06703,0.419201 -0.02088,0.507119 z M -99.640286,-2.4131004 c -0.05021,0 -0.318098,-0.2678906 -0.595314,-0.5953125 l -0.50403,-0.5953125 0.59532,0.5040286 c 0.327417,0.2772146 0.595308,0.5451052 0.595308,0.5953125 0,0.050205 -0.04108,0.091284 -0.09128,0.091284 z" id="path135" />
                  <path style="fill:#767676;fill-opacity:1;stroke-width:0.264583" d="m -118.5741,28.013981 c -0.0728,0 0.33275,-0.47625 0.90114,-1.058333 0.56839,-0.582083 1.09297,-1.058333 1.16573,-1.058333 0.0728,0 -0.33276,0.47625 -0.90115,1.058333 -0.56839,0.582083 -1.09296,1.058333 -1.16572,1.058333 z m 73.450667,0 c -0.04323,0 -0.549243,-0.506015 -1.124479,-1.124479 l -1.045885,-1.124479 1.124479,1.045885 c 0.618464,0.575236 1.12448,1.081251 1.12448,1.124479 0,0.04323 -0.03537,0.07859 -0.07859,0.07859 z M -64.044561,-2.4131004 c -0.07276,0 0.08321,-0.238125 0.346598,-0.5291667 0.26339,-0.2910416 0.538422,-0.5291666 0.611183,-0.5291666 0.07276,0 -0.08321,0.238125 -0.346599,0.5291666 -0.26339,0.2910417 -0.538422,0.5291667 -0.611182,0.5291667 z" id="path133" />
                  <path style="fill:#606060;fill-opacity:1;stroke-width:0.264583" d="m -82.770009,4.7097604 c -0.308227,-0.0127 -0.37092,-0.07539 -0.159854,-0.1598507 0.190995,-0.07643 0.419198,-0.067032 0.507119,0.020876 0.08792,0.087918 -0.06835,0.1504527 -0.347265,0.1389645 z m 1.852083,0 c -0.308226,-0.0127 -0.370919,-0.07539 -0.159853,-0.1598507 0.190994,-0.07643 0.4192,-0.067032 0.507119,0.020876 0.08792,0.087918 -0.06835,0.1504527 -0.347266,0.1389645 z" id="path131" />
                  <path style="fill:#494949;fill-opacity:1;stroke-width:0.264583" d="m -81.82192,4.6888742 c -0.363802,0 -0.51263,-0.060055 -0.330729,-0.1334532 0.181901,-0.073398 0.479557,-0.073398 0.661458,0 0.181901,0.073398 0.03307,0.1334532 -0.330729,0.1334532 z m 18.156353,-44.4082232 c -0.05494,0 -0.2633,-0.208359 -0.463021,-0.46302 -0.329107,-0.419644 -0.319749,-0.429003 0.0999,-0.09989 0.254662,0.199719 0.463021,0.408078 0.463021,0.463021 0,0.05494 -0.04495,0.09989 -0.0999,0.09989 z" id="path129" />
                  <path style="fill:#333333;fill-opacity:1;stroke-width:0.264583" d="m -81.292753,66.287189 c -25.247867,0.02252 -46.262397,-0.04687 -46.698957,-0.154173 -0.43656,-0.107301 -1.15094,-0.382293 -1.5875,-0.611092 -0.43656,-0.228801 -1.05596,-0.696828 -1.37643,-1.040061 -0.32048,-0.343236 -0.76696,-1.065099 -0.99219,-1.604142 -0.22523,-0.539044 -0.4095,-1.712762 -0.4095,-2.608265 0,-0.895504 0.18449,-2.893626 0.40999,-4.440269 0.22549,-1.546646 0.74923,-4.122968 1.16386,-5.72516 0.41462,-1.602192 1.24824,-4.162036 1.85247,-5.688541 0.60423,-1.526506 1.69412,-3.891471 2.42196,-5.255477 0.72785,-1.364009 1.90534,-3.342465 2.61664,-4.396571 0.7113,-1.054105 2.00138,-2.795598 2.86684,-3.869986 0.86546,-1.074385 2.74776,-3.090216 4.18288,-4.479623 1.43512,-1.389406 3.50228,-3.19433 4.59369,-4.01094 1.0914,-0.816613 2.9964,-2.099514 4.23333,-2.850891 1.23693,-0.751377 3.32052,-1.879256 4.63021,-2.506395 1.30969,-0.627136 3.668582,-1.580097 5.24199,-2.117688 1.573408,-0.537591 4.192783,-1.261178 5.820833,-1.607978 1.62805,-0.346798 4.656733,-0.776269 6.730405,-0.954382 2.973474,-0.255399 4.56715,-0.255399 7.540624,0 2.073672,0.178113 5.102355,0.607584 6.730405,0.954382 1.62805,0.3468 4.247425,1.070387 5.820833,1.607978 1.573408,0.537591 3.932303,1.490401 5.241991,2.117357 1.309687,0.626957 3.333749,1.714852 4.497916,2.417543 1.164167,0.702689 3.069167,1.990005 4.233333,2.860702 1.164167,0.870696 3.290858,2.715603 4.72598,4.099795 1.435121,1.384191 3.317417,3.395755 4.182877,4.47014 0.86546,1.074388 2.155541,2.815881 2.866845,3.869986 0.711303,1.054106 1.888788,3.032562 2.616633,4.396571 0.727848,1.364006 1.799318,3.682518 2.381044,5.152249 0.581729,1.469729 1.415838,4.029573 1.853578,5.688542 0.43774,1.658966 0.97989,4.281741 1.204777,5.828387 0.224891,1.546643 0.40889,3.544765 0.40889,4.440269 0,0.895503 -0.184277,2.069221 -0.409503,2.608265 -0.225227,0.539043 -0.671711,1.261181 -0.992188,1.60475 -0.320476,0.34357 -1.058934,0.880976 -1.641017,1.194237 l -1.058333,0.569563 z m 0.132291,-61.9325735 c -2.686211,0.062677 -4.524517,-0.024818 -5.688541,-0.2707137 -0.945885,-0.1998213 -2.745835,-0.7369228 -3.999886,-1.1935539 -1.254054,-0.4566338 -3.278116,-1.4439185 -4.497917,-2.19396988 -1.286052,-0.79078928 -3.177166,-2.31403252 -4.501279,-3.62566722 -1.255905,-1.2440655 -2.844925,-3.133918 -3.531165,-4.1996755 -0.68624,-1.0657549 -1.60752,-2.7312645 -2.04728,-3.7011293 -0.43975,-0.969864 -1.09626,-2.895851 -1.45891,-4.279968 -0.54957,-2.097551 -0.66019,-3.13335 -0.66439,-6.220746 -0.004,-3.131841 0.0987,-4.09739 0.66657,-6.249162 0.36937,-1.399748 1.08822,-3.446724 1.59742,-4.548831 0.50921,-1.102109 1.38323,-2.694097 1.94227,-3.537753 0.55904,-0.843656 1.79035,-2.356364 2.73623,-3.361575 0.94589,-1.00521 2.493702,-2.416017 3.439587,-3.135126 0.945886,-0.719108 2.799853,-1.834092 4.119928,-2.477742 1.320075,-0.643649 3.582262,-1.479137 5.027083,-1.85664 2.201275,-0.575149 3.205736,-0.686369 6.198822,-0.686369 2.996335,0 3.998201,0.11116 6.217708,0.689868 1.455208,0.379427 3.649337,1.17071 4.875842,1.758407 1.226502,0.587697 2.952909,1.587503 3.836458,2.221792 0.883547,0.634289 2.41033,1.969038 3.392855,2.966109 0.982522,0.997071 2.213121,2.408169 2.734662,3.135773 0.521541,0.727604 1.356945,2.127935 1.856449,3.111845 0.499504,0.983911 1.140203,2.41266 1.423776,3.175001 0.283569,0.762339 0.693319,2.159976 0.91055,3.105862 0.217231,0.945885 0.475448,2.690505 0.573815,3.876934 0.106183,1.280678 0.04604,3.215722 -0.148011,4.7625 -0.179771,1.432946 -0.626636,3.557857 -0.993028,4.722023 -0.366393,1.164167 -1.024597,2.831042 -1.462675,3.704167 -0.438079,0.8731249 -1.388221,2.4460198 -2.111431,3.4953202 -0.723206,1.0493031 -2.234136,2.7860307 -3.357618,3.8594002 -1.123479,1.0733669 -3.03762,2.56386001 -4.253639,3.31220747 -1.216023,0.74834483 -2.993851,1.65706153 -3.950727,2.01936603 -0.956879,0.3623072 -2.454153,0.8546491 -3.327278,1.0940917 -1.038939,0.2849192 -2.958904,0.4673521 -5.55625,0.5279549 z" id="path127" />
                </g>
              </svg>
            </div>
          </div>

          <div class="flex justify-center">
            <div class="flex">
              <h1 class="text-gray-600 font-bold md:text-2xl text-xl">Usuarios</h1>
            </div>
          </div>

          <div class="grid grid-cols-1">
            <div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 b-5 mx-7">
              <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Usuario</label>
              <span class="md:flex md:justify-end"><?php echo "{$row->username}"; ?></span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
              <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Nombre</label>
              <span class="md:flex md:justify-end"><?php echo "{$row->nombre}"; ?></span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
              <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Apellido paterno</label>
              <span class="md:flex md:justify-end"><?php echo "{$row->apellido_pat}"; ?></span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
              <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Apellido materno</label>
              <span class="md:flex md:justify-end"><?php echo "{$row->apellido_mat}"; ?></span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
              <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Correo</label>
              <span class="md:flex md:justify-end"><?php echo "{$row->correo}"; ?></span>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
              <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Departamento</label>
              <span class="md:flex md:justify-end"><?php if($row->depanom == null){ echo "Sin departamento"; }else{ echo $row->depanom; } ?></span>
            </div>
			
			<div class="grid grid-cols-1 md:grid-cols-2 border-b-2 border-gray-200 mt-5 mx-7">
              <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Rol</label>
              <span class="md:flex md:justify-end"><?php if($row->rolnom == null){ echo "Sin rol"; }else{ echo $row->rolnom; } ?></span>
            </div>

            
            <div class="grid grid-cols-1 mt-5 mx-7">
              <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Foto</label>
              <img id="preview" <?php if($row->foto != null && $row->filename != null){ echo "class='w-full' src='".$row->foto."'"; }else { echo "class='hidden'"; } ?> />
              <?php if($row->foto != null && $row->filename != null){ echo "<a href='{$row->foto}' download='{$row->filename}' id='archivo' class='text-sm text-center pt-1 tracking-wider'><span class='text-blue-600 hover:border-b-2 hover:border-blue-600'>{$row->filename}</span></a>";}else{ echo "<span class='text-center text-sm'>No se encontró la foto en la base de datos</span>"; }?>         
            </div>

            <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
              <a href="users.php" class='w-auto bg-gray-500 hover:bg-gray-700 rounded-lg shadow-xl font-medium text-white px-4 py-2' id='regresar' name='regresar'>Regresar</a>
              <a href="editar_usuario.php?idUser=<?php echo $verid; ?>" class='w-auto bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg shadow-xl font-medium text-white px-4 py-2' id='editar' name='editar'>Editar</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>