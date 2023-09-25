<div class="container mx-auto px-6 py-8">
<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300&family=Zilla+Slab+Highlight:wght@700&display=swap');
.Titulos{
    font-family: 'Poppins', sans-serif;
    color: #000000;
    font-size: 2.75rem !important;
}
    </style>
   <h2 class="Titulos text-3xl font-semibold sm:text-5xl lg:text-6xl">
      <?php mb_internal_encoding('UTF-8'); $papelera = ucfirst(mb_strtolower($fetchpapelera -> nombre)); echo "{$papelera}"; ?>
   </h2>
   <div class="mt-4">
      <div class="flex flex-col mt-8">
         <div class="overflow-x-auto">
            <div class="min-w-screen bg-transparent flex items-center justify-center bg-gray-100 font-sans overflow-hidden">
               <div class="w-full">
                  <div class="bg-gray-50 shadow-md rounded-t">
                     <div class="container flex flex-col sm:flex-row items-center px-6 py-4 mx-auto overflow-y-auto whitespace-nowrap">
                        <a href="dashboard.php" class="inline-flex items-center text-sm font-medium text-gray-700 focus:outline-none focus:text-[#27ceeb] hover:text-[#27ceeb]">
                           <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" viewBox="0 0 24 24">
                              <path fill="currentColor" d="M10,20V14H14V20H19V12H22L12,3L2,12H5V20H10Z" />
                           </svg>
                           Home
                        </a>
                        <span class="mx-3 rotate-90 sm:rotate-0 text-gray-500 mt-1">
                           <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor">
                              <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                           </svg>
                        </span>
                        <a href="expedientes.php" class="inline-flex items-center text-sm font-medium text-gray-700 focus:outline-none focus:text-[#27ceeb] hover:text-[#27ceeb]">
                           <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" viewBox="0 0 24 24">
                              <path fill="currentColor" d="M13,9H18.5L13,3.5V9M6,2H14L20,8V20A2,2 0 0,1 18,22H6C4.89,22 4,21.1 4,20V4C4,2.89 4.89,2 6,2M15,18V16H6V18H15M18,14V12H6V14H18Z" />
                           </svg>
                           Expedientes
                        </a>
                        <span class="mx-3 rotate-90 sm:rotate-0 text-gray-500 mt-1">
                           <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor">
                              <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                           </svg>
                        </span>
                        <a href="ver_expediente.php?idExpediente=<?php echo $expedienteid ?>" class="inline-flex items-center text-sm font-medium text-gray-700 focus:outline-none focus:text-[#27ceeb] hover:text-[#27ceeb]">
                           <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" viewBox="0 0 24 24">
                              <path fill="currentColor" d="M13,9H18.5L13,3.5V9M6,2H14L20,8V20A2,2 0 0,1 18,22H6C4.89,22 4,21.1 4,20V4C4,2.89 4.89,2 6,2M14,20V19C14,17.67 11.33,17 10,17C8.67,17 6,17.67 6,19V20H14M10,12A2,2 0 0,0 8,14A2,2 0 0,0 10,16A2,2 0 0,0 12,14A2,2 0 0,0 10,12Z" />
                           </svg>
                           Ver Expedientes
                        </a>
                        <span class="mx-3 rotate-90 sm:rotate-0 text-gray-500 mt-1">
                           <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor">
                              <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                           </svg>
                        </span>
                        <div class="flex items-center text-gray-400">
                           <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5 mr-2">
                              <path fill="currentColor" d="M19 13C19.34 13 19.67 13.04 20 13.09V8L14 2H6C4.89 2 4 2.89 4 4V20C4 21.11 4.89 22 6 22H13.81C13.3 21.12 13 20.1 13 19C13 15.69 15.69 13 19 13M13 3.5L18.5 9H13V3.5M20 19.5V18H16V16H20V14.5L23 17L20 19.5M18 20H22V22H18V23.5L15 21L18 18.5V20Z" />
                           </svg>
                           <span class="text-sm font-medium">Ver historial</span>
                        </div>
                     </div>
                  </div>
                  <div class="bg-white p-3 shadow-md rounded-b">
                     <table class="w-full" id="datatable" style="display:none; word-break: break-word;">
                        <thead>
                           <tr class="bg-gray-800 text-white uppercase text-sm leading-normal">
                              <th class="py-3 text-left all">id</th>
                              <th class="py-3 text-left all">Nombre del archivo</th>
                              <th class="py-3 text-left desktop">identificador</th>
                              <th class="py-3 text-left desktop">Fecha de subida</th>
                              <th class="py-3 text-center desktop">¿Vincular al expediente?</th>
                              <th class="py-3 text-center min-tablet">Acción</th>
                           </tr>
                        </thead>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>