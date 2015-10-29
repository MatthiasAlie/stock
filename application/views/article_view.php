
	<body>


		<header class="app-bar fixed-top" data-role='appbar'>
			<div class="container">
				<a class='app-bar-element branding' href="#"><?php echo img($logo); ?> Stock Chaudron</a>
				<span class="app-bar-divider"></span>
			</div>
		</header>


		<div class="container page-content">
			<div class="margin60 no-margin-left no-margin-right">
				<h1>Stock du Chaudron</h1>
			    <br />
			    <button class="image-button button primary" onclick="add_person()"><span class="icon mif-plus bg-darkCobalt"></span>Ajout d'un article</button>
			    <br />
			    <br />
                <table id="table" class="dataTable hovered" id="table" data-searching="true">
                  <thead>
                    <tr>
                      <th>Article</th>
                      <th>SN</th>
                      <th>Etat</th>
                      <th>Emprunte</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>


                </table>



			</div>

		</div>






         <!-- End  modal -->

         <div data-role="dialog" id="dialog" class="padding20 dialog" data-close-button='true' data-type='info' data-overlay='true' data-overlay-color='op-dark' style="width: auto; height: auto; visibility: hidden; left: 172.5px; top: 238.5px;">
			 <h2 class="titleDialog"></h2>
               <form action="#" id="form">
                 <input type="hidden" value="" name="id"/>
                 <div class="form-body">

                   <div class="cell">
                     <label>Article</label>
                     <div class="imput-class text">
                       <input name="article" placeholder="Article" type="text">
                     </div>
                   </div>

                   <div class="cell">
                     <label>Numéro de Série</label>
                     <div class="imput-class text">
                       <input name="sn" placeholder="N° de Serie" type="text">
                     </div>
                   </div>

                   <div class="cell">
                     <label>Etat</label>
                     <div class="imput-class select">
                       <select name="etat">
                         <option value="Bon">Bon</option>
                         <option value="A Reparer">A reparer</option>
                       </select>
                     </div>
                   </div>

                   <div class="cell">
                     <label>Emprunté ?</label>
                     <div class="imput-class text">
                       <input name="emprunte" placeholder="Emprunté ?">
                     </div>
                   </div>

                 </div>
               </form>


               <button type="button" id="btnSave" onclick="save()" class="button primary">Save</button>


        </div>
