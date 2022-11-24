<div class="container mx-auto px-6 py-8">
  <div class="flex items-center justify-center">
    <div class="grid w-11/12 md:w-9/12">
      <h3 class="text-gray-700 text-3xl font-medium">Editar usuarios</h3>
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

              <a href="editar_usuario.php?idUser=<?php echo $editarid ?>" class="flex items-center text-blue-600 -px-2 hover:underline">
                <svg class="w-5 h-5" viewBox="0 0 24 24">
                  <path fill="currentColor" d="M21.7,13.35L20.7,14.35L18.65,12.3L19.65,11.3C19.86,11.09 20.21,11.09 20.42,11.3L21.7,12.58C21.91,12.79 21.91,13.14 21.7,13.35M12,18.94L18.06,12.88L20.11,14.93L14.06,21H12V18.94M12,14C7.58,14 4,15.79 4,18V20H10V18.11L14,14.11C13.34,14.03 12.67,14 12,14M12,4A4,4 0 0,0 8,8A4,4 0 0,0 12,12A4,4 0 0,0 16,8A4,4 0 0,0 12,4Z" />
                </svg>

                <span class="mx-2">Editar Usuarios</span>
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
              <h1 class="text-gray-600 font-bold md:text-2xl text-xl">Formulario</h1>
            </div>
          </div>

          <form id="Guardar" method="post">
            <div class="grid grid-cols-1 mt-5 mx-7">
              <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Usuario</label>
              <div class="group flex">
                <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-account-outline text-gray-400 text-lg"></i></div>
                <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="usuario" name="usuario" value="<?php echo "{$row->username}"; ?>" placeholder="Input 1">
              </div>
            </div>

            <div x-data="{showen:true}" class='grid grid-cols-1 mt-5 mx-7'>
              <div x-show="showen">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Contraseña (Opcional)</label>
                <div class="group flex" x-data="{isshow:false}">
                  <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-lock-outline text-gray-400 text-lg"></i></div>
                  <input class="w-full -ml-10 pl-10 -mr-10 pr-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" x-bind:type="isshow ? 'text' : 'password'" type="password" id="password" name="password" placeholder="************">
                  <button type="button" @click="isshow=!isshow" class="z-30 mt-1 text-gray-600">
                    <svg x-show="!isshow" aria-hidden="true" class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                    </svg>
                    <svg x-show="isshow" aria-hidden="true" class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="display: none;">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path>
                    </svg>
                  </button>
                </div>
              </div>
            </div>

            <div x-data="{showen:true}" class='grid grid-cols-1 mt-5 mx-7'>
              <div x-show="showen">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Confirmar contraseña</label>
                <div class="group flex" x-data="{isshow:false}">
                  <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-lock-outline text-gray-400 text-lg"></i></div>
                  <input class="w-full -ml-10 pl-10 -mr-10 pr-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" x-bind:type="isshow ? 'text' : 'password'" type="password" id="cpassword" name="cpassword" placeholder="************">
                  <button type="button" @click="isshow=!isshow" class="z-30 mt-1 text-gray-600">
                    <svg x-show="!isshow" aria-hidden="true" class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                    </svg>
                    <svg x-show="isshow" aria-hidden="true" class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="display: none;">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path>
                    </svg>
                  </button>
                </div>
              </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-5 md:gap-8 mt-5 mx-7 items-start">
              <div class="grid grid-cols-1">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Nombre</label>
                <div class="group flex">
                  <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-account-edit-outline text-gray-400 text-lg"></i></div>
                  <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="nombre" name="nombre" value="<?php echo "{$row->nombre}"; ?>" placeholder="Input 2">
                </div>
              </div>
              <div class="grid grid-cols-1">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Apellido paterno</label>
                <div class="group flex">
                  <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-account-edit-outline text-gray-400 text-lg"></i></div>
                  <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="apellido_pat" name="apellido_pat" value="<?php echo "{$row->apellido_pat}"; ?>" placeholder="Input 3">
                </div>
              </div>
              <div class="grid grid-cols-1">
                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Apellido materno</label>
                <div class="group flex">
                  <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-account-edit-outline text-gray-400 text-lg"></i></div>
                  <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="apellido_mat" name="apellido_mat" value="<?php echo "{$row->apellido_mat}"; ?>" placeholder="Input 4">
                </div>
              </div>
            </div>

            <div class="grid grid-cols-1 mt-5 mx-7">
              <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Correo</label>
              <div class="group flex">
                <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-email text-gray-400 text-lg"></i></div>
                <input class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" type="text" id="correo" name="correo" value="<?php echo "{$row->correo}"; ?>" placeholder="Input 5">
              </div>
            </div>

            <div class="grid grid-cols-1 mt-5 mx-7">
              <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Rol</label>
              <div class="group flex">
                <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-account-lock-outline text-gray-400 text-lg"></i></div>
                <select class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" id="rol" name="rol">
                  <option value="">Sin rol</option>
                  <?php
                  $roles = roles::FetchRol();
                  foreach ($roles as $rq) {
                    if(Roles::FetchSessionRol($_SESSION["rol"]) == "Superadministrador" || Roles::FetchSessionRol($_SESSION["rol"]) == "Administrador" && $rq->nombre != "Superadministrador" || Permissions::CheckPermissions($_SESSION["id"], "Crear usuario") == "true" && Permissions::CheckPermissions($_SESSION["id"], "Vista tecnico") == "false" && $rq->nombre != "Superadministrador" && $rq->nombre != "Administrador" || Permissions::CheckPermissions($_SESSION["id"], "Crear usuario") == "true" && Permissions::CheckPermissions($_SESSION["id"], "Vista tecnico") == "true" && $rq->nombre=="Tecnico"){
                      echo "<option value='" . $rq->id . "'";
                      if ($row->roles_id == $rq->id) echo 'selected="selected"';
                      echo ">";
                      echo "" . $rq->nombre . "";
                      echo "</option>";
                    }
                  }
                  ?>
                </select>
              </div>
            </div>

            <div class="grid grid-cols-1 mt-5 mx-7">
              <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Subrol</label>
              <div class="group flex">
                <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-account-lock-outline text-gray-400 text-lg"></i></div>
                <select class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" id="subrol" name="subrol">
                  <option value="">Sin subrol</option>
                </select>
              </div>
            </div>

            <div class="grid grid-cols-1 mt-5 mx-7">
              <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Departamento</label>
              <div class="group flex">
                <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-account-lock-outline text-gray-400 text-lg"></i></div>
                <select class="w-full -ml-10 pl-10 py-2 px-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-black focus:border-transparent" id="departamento" name="departamento">
                  <option value="">Sin departamento</option>
                  <?php
                  $departamentos = departamentos::FetchDepartamento();
                  foreach ($departamentos as $dp) {
                    echo "<option value='" . $dp->id . "'";
                    if ($row->departamento_id == $dp->id) echo 'selected="selected"';
                    echo ">";
                    echo "" . $dp->departamento . "";
                    echo "</option>";
                  }
                  ?>
                </select>
              </div>
            </div>

            <div class="grid grid-cols-1 mt-5 mx-7">
              <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold mb-1">Subir foto</label>
              <div class='flex items-center justify-center w-full'>
                <label class='flex flex-col border-4 border-dashed w-full hover:bg-gray-100 hover:border-black group'>
                  <div class='flex flex-col items-center justify-center pt-7'>
                    <div id="svg" <?php if($row->foto != null && $row->nombre_foto != null){ echo "class='hidden'";  } ?>>
                    <svg class="w-10 h-10 text-gray-400 group-hover:text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    </div>
                    <img id="preview" <?php if($row->foto != null && $row->nombre_foto != null){ echo "class='w-10 h-10' src='".$row->foto."'"; }else { echo "class='hidden'"; } ?>/>
                    <p id="archivo" class='lowercase text-sm text-center text-gray-400 group-hover:text-black pt-1 tracking-wider'><?php if ($row->foto == null) {
                                                                                                                          echo "Selecciona una fotografía";
                                                                                                                        } else {
                                                                                                                          echo $row->nombre_foto;
                                                                                                                        } ?></p>
                  </div>
                  <input type='file' id="foto" name="foto" class="hidden" />
                </label>
              </div>
              <div id="error"></div>
            </div>

            <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
              <a href="users.php" class='w-auto bg-gray-500 hover:bg-gray-700 rounded-lg shadow-xl font-medium text-white px-4 py-2' id='regresar' name='regresar'>Regresar</a>
              <div id="submit-button">
                <button class='w-auto bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg shadow-xl font-medium text-white px-4 py-2' id='grabar' name='grabar'>Guardar</button>
              </div>                                                                                                          
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>