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
    <?php if($fetch_information -> tipo == "ACTA ADMINISTRATIVA"){ echo "Ver acta administrativa"; }else if($fetch_information -> tipo == "CARTA COMPROMISO"){ echo "Ver carta compromiso"; } ?>
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
                <a href="incidencias.php" class="inline-flex items-center text-sm font-medium text-gray-700 focus:outline-none focus:text-[#27ceeb] hover:text-[#27ceeb]">
                  <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M13,9.5H18V7.5H13V9.5M13,16.5H18V14.5H13V16.5M19,21H5A2,2 0 0,1 3,19V5A2,2 0 0,1 5,3H19A2,2 0 0,1 21,5V19A2,2 0 0,1 19,21M6,11H11V6H6V11M7,7H10V10H7V7M6,18H11V13H6V18M7,14H10V17H7V14Z"></path>
                  </svg>
                  Incidencias
                </a>
                <span class="mx-3 rotate-90 sm:rotate-0 text-gray-500 mt-1">
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                  </svg>
                </span>
                <a href="actas_cartas.php" class="inline-flex items-center text-sm font-medium text-gray-700 focus:outline-none focus:text-[#27ceeb] hover:text-[#27ceeb]">
                  <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M14,17H7V15H14M17,13H7V11H17M17,9H7V7H17M19,3H5C3.89,3 3,3.89 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5C21,3.89 20.1,3 19,3Z"></path>
                  </svg>
                  Actas y cartas
                </a>
                <span class="mx-3 rotate-90 sm:rotate-0 text-gray-500 mt-1">
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                  </svg>
                </span>
                <div class="flex items-center text-gray-400">
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M13,9H18.5L13,3.5V9M6,2H14L20,8V20A2,2 0 0,1 18,22H6C4.89,22 4,21.1 4,20V4C4,2.89 4.89,2 6,2M14,20V19C14,17.67 11.33,17 10,17C8.67,17 6,17.67 6,19V20H14M10,12A2,2 0 0,0 8,14A2,2 0 0,0 10,16A2,2 0 0,0 12,14A2,2 0 0,0 10,12Z" />
                  </svg>
                  <span class="text-sm font-medium">Ver documento</span>
                </div>
              </div>
            </div>
            <div class="bg-white p-3 shadow-md rounded-b">
              <div class="flex flex-col mt-5 mx-7">
                <h2 class="text-2xl text-[#64748b] font-semibold"><?php if($fetch_information -> tipo == "ACTA ADMINISTRATIVA"){ echo "Acta administrativa para: " .$fetch_information -> asignada_a. ""; }else if($fetch_information -> tipo == "CARTA COMPROMISO"){ echo "Carta compromiso para: " .$fetch_information -> asignada_a. ""; } ?></h2>
                <span class="text-[#64748b]">En esta sección puede visualizar los documentos administrativos asignados a un empleado.</span>
                <div class="my-3 h-px bg-slate-200"></div>
              </div>
              <?php if($fetch_information -> tipo == "ACTA ADMINISTRATIVA"){ ?>
                <div class="px-4 py-2 mt-1 mx-7 text-sm text-yellow-800 rounded-lg bg-yellow-50" role="alert">
	                <span class="font-medium">ACTA AMINISTRATIVA “F.03”</span> Documento exclusivo para uso interno de SNTTCM Integración de Tecnología y Comunicación.
                </div>
                <div id="main_acta" class="mt-5 mx-7 p-2" style="border: 5px solid black;">
                  <div id="information" style="word-break:break-word;">
                    <div class="grid grid-cols-1 mt-1 mx-7">
                      <div class="group flex items-center justify-end gap-3">
                        <p>rh@sinttecom.com</p>
                        <svg class="shrink-0 w-5 h-5 text-gray-700" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                          <path fill="currentColor" d="M20,8L12,13L4,8V6L12,11L20,6M20,4H4C2.89,4 2,4.89 2,6V18A2,2 0 0,0 4,20H20A2,2 0 0,0 22,18V6C22,4.89 21.1,4 20,4Z" />
                        </svg>
                      </div>
                    </div>
                    <div class="grid grid-cols-1 mt-1 mx-7">
                      <div class="group flex items-center justify-end gap-3">
                          <p>Vista Grande 211. Col. Linda Vista. Gpe N.L. CP 67130</p>
                          <svg class="shrink-0 w-5 h-5 text-gray-700" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M12,11.5A2.5,2.5 0 0,1 9.5,9A2.5,2.5 0 0,1 12,6.5A2.5,2.5 0 0,1 14.5,9A2.5,2.5 0 0,1 12,11.5M12,2A7,7 0 0,0 5,9C5,14.25 12,22 12,22C12,22 19,14.25 19,9A7,7 0 0,0 12,2Z" />
                          </svg>
                      </div>
                    </div>
                    <div class="grid grid-cols-1 mt-1 mx-7">
                      <div class="group flex items-center justify-end gap-3">
                        <p>(81)1931 3386 (81)2086 8812 (81)2086 8813</p>
                        <svg class="shrink-0 w-5 h-5 text-gray-700" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                          <path fill="currentColor" d="M6.62,10.79C8.06,13.62 10.38,15.94 13.21,17.38L15.41,15.18C15.69,14.9 16.08,14.82 16.43,14.93C17.55,15.3 18.75,15.5 20,15.5A1,1 0 0,1 21,16.5V20A1,1 0 0,1 20,21A17,17 0 0,1 3,4A1,1 0 0,1 4,3H7.5A1,1 0 0,1 8.5,4C8.5,5.25 8.7,6.45 9.07,7.57C9.18,7.92 9.1,8.31 8.82,8.59L6.62,10.79Z" />
                        </svg>
                      </div>
                    </div>
                  </div>
                  <div class="grid grid-cols-1 mt-5">
                    <h1 class="text-2xl text-black text-center font-semibold mt-5">ACTA ADMINISTRATIVA</h1>
                  </div>
                  <div id="texto-acta" class="grid grid-cols-1 mt-5 mx-7">
                    <p>En la ciudad de Monterrey, NL. Fecha <?php echo $fetch_information -> fecha; ?></p>
                    <p class="mt-5"> Hacemos constar que el C. <u><?php echo $fetch_information -> asignada_a; ?></u>, quien es empleado de la empresa SNTTCM INTEGRACIÓN DE TECNOLOGÍA Y COMUNICACIÓN, S.C. incurrió en la siguiente falta a las políticas y reglamentos de la empresa.</p>
                    <p class="mt-5">Motivo:</p>
                    <p class="block border-b-2 border-black mt-5"><?php echo $fetch_information -> motivo_acta; ?></p>
                    <p class="mt-5"> En uso de la palabra el trabajador involucrado, Sr.(a) <u><?php echo $fetch_information -> asignada_a; ?></u> manifestó con relación a los hechos que se le atribuyen lo siguiente:</p>
                    <p class="mt-5"> Observaciones y/o Comentarios: </p>
                    <p class="block border-b-2 border-black mt-5"> <?php echo $fetch_information -> observaciones_acta; ?> </p>
                  </div>
                  <div id="firmas" class="mt-20">
                    <div id="trabajador" class="grid grid-cols-1 mt-5 mx-7 text-center">
                      <span class="border-t-2 border-black font-semibold px-7"><?php echo $fetch_information -> asignada_a; ?></span>
                      <span class="font-semibold px-7">Trabajador involucrado</span>
                    </div>
                    <div id="testigos" class="mt-10">
                      <div class="grid grid-cols-1 md:grid-cols-2 mt-5 mx-7 text-center gap-10">
                        <div id="creada_por" class="grid grid-cols-1">
                          <span class="border-t-2 border-black font-semibold px-7"><?php echo $fetch_information -> creada_por; ?></span>
                          <span class="font-semibold px-7">Testigo</span>
                        </div>
                        <div id="capital_humano" class="grid grid-cols-1">
                          <span class="border-t-2 border-black font-semibold px-7">Capital humano</span>
                          <span class="font-semibold px-7">Testigo</span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div id="footer" class="text-center mt-5">
                    <span>Se levanta la presente Acta con fundamento legal en el Articulo No. 134 de la ley federal del trabajo.</span>
                  </div>
                </div>
              <?php }else{ ?>
                <div class="px-4 py-2 mt-1 mx-7 text-sm text-yellow-800 rounded-lg bg-yellow-50" role="alert">
                  <span class="font-medium">CARTA COMPROMISO “F.18”</span> Documento exclusivo para uso interno de SNTTCM Integración de Tecnología y Comunicación.
                </div>
                <div id="main_carta" class="mt-5 mx-7 p-2" style="border: 5px solid black;">
                  <div id="information_carta" style="word-break:break-word;">
                    <div class="grid grid-cols-1 mt-1 mx-7">
                      <div class="group flex items-center justify-end gap-3">
                        <p>rh@sinttecom.com</p>
                        <svg class="shrink-0 w-5 h-5 text-gray-700" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                          <path fill="currentColor" d="M20,8L12,13L4,8V6L12,11L20,6M20,4H4C2.89,4 2,4.89 2,6V18A2,2 0 0,0 4,20H20A2,2 0 0,0 22,18V6C22,4.89 21.1,4 20,4Z" />
                        </svg>
                      </div>
                    </div>
                    <div class="grid grid-cols-1 mt-1 mx-7">
                      <div class="group flex items-center justify-end gap-3">
                        <p>Vista Grande 211. Col. Linda Vista. Gpe N.L. CP 67130</p>
                        <svg class="shrink-0 w-5 h-5 text-gray-700" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                          <path fill="currentColor" d="M12,11.5A2.5,2.5 0 0,1 9.5,9A2.5,2.5 0 0,1 12,6.5A2.5,2.5 0 0,1 14.5,9A2.5,2.5 0 0,1 12,11.5M12,2A7,7 0 0,0 5,9C5,14.25 12,22 12,22C12,22 19,14.25 19,9A7,7 0 0,0 12,2Z" />
                        </svg>
                      </div>
                    </div>
                    <div class="grid grid-cols-1 mt-1 mx-7">
                      <div class="group flex items-center justify-end gap-3">
                        <p>(81)1931 3386 (81)2086 8812 (81)2086 8813</p>
                        <svg class="shrink-0 w-5 h-5 text-gray-700" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                          <path fill="currentColor" d="M6.62,10.79C8.06,13.62 10.38,15.94 13.21,17.38L15.41,15.18C15.69,14.9 16.08,14.82 16.43,14.93C17.55,15.3 18.75,15.5 20,15.5A1,1 0 0,1 21,16.5V20A1,1 0 0,1 20,21A17,17 0 0,1 3,4A1,1 0 0,1 4,3H7.5A1,1 0 0,1 8.5,4C8.5,5.25 8.7,6.45 9.07,7.57C9.18,7.92 9.1,8.31 8.82,8.59L6.62,10.79Z" />
                        </svg>
                      </div>
                    </div>
                  </div>
                  <div class="grid grid-cols-1 mt-5">
                    <h1 class="text-2xl text-black text-center font-semibold mt-5">CARTA COMPROMISO</h1>
                  </div>
                  <div id="texto-carta" class="grid grid-cols-1 mt-10 mx-7">
                    <p class="mt-5">Yo __________________________________colaborando en el departamento de <?php echo $fetch_information -> departamento_del_asignado; ?> en Sinttecom, estoy consciente de que en caso de no cumplir con este compromiso, se levantará un acta administrativa el cuál se vinculará al expediente.</p>
                    <p class="mt-5">Me comprometo a:</p>
                    <p class="block border-b-2 border-black mt-5"><?php echo $fetch_information -> responsabilidades_carta; ?></p>
                    <p class="mt-5">De igual forma me comprometo a cumplir con cada punto del reglamento firmado para un buen desempeño dentro de la organización.</p>
                  </div>
                  <div id="firmas" class="mt-20">
                    <div id="trabajador" class="grid grid-cols-1 mt-5 mx-7 text-center">
                      <span class="border-t-2 border-black font-semibold px-7"><?php echo $fetch_information -> asignada_a; ?></span>
                      <span class="font-semibold px-7">Trabajador involucrado</span>
                    </div>
                    <div id="testigos" class="mt-10">
                      <div class="grid grid-cols-1 md:grid-cols-2 mt-5 mx-7 text-center gap-10">
                        <div id="creada_por" class="grid grid-cols-1">
                          <span class="border-t-2 border-black font-semibold px-7"><?php echo $fetch_information -> creada_por; ?></span>
                          <span class="font-semibold px-7">Testigo</span>
                        </div>
                        <div id="capital_humano" class="grid grid-cols-1">
                          <span class="border-t-2 border-black font-semibold px-7">Capital humano</span>
                          <span class="font-semibold px-7">Testigo</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              <?php } ?>
              <div class="mt-12 h-px bg-slate-200 mx-7"></div>
              <div class="grid grid-cols-1 mx-7 mt-5">
                <div class="text-center md:text-right">	
                  <button type="button" id="print" name="print" class="button btn-celeste text-white rounded-md h-11 px-8 py-2 focus:ring-2 focus:outline-none focus:ring-[#27ceeb]/50 hover:bg-celeste-500 active:bg-celeste-700">Imprimir</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <style>
    		.btn-celeste{
		background-color: #00a3ff  !important;
		border: none !important;
		box-shadow: 3px 3px 4px 0px rgb(0 0 0 / 22%) !important;
		font-weight: 500 !important;
		border-bottom: #fff 9px;
	}
	
		.btn-celeste:hover{
		background-color: #008eff !important;
	}
    </style>
</div>
