<div class="container-newform"><!--- Container--->
    
            <nav class="navbar navbar-expand-lg navbar-light navbar-custom">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown forms-dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Forms
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                
                <li class="nav-item dropdown pl-5">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Settings
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Entries</a>
                </li>
                </ul>
                <button class="btn btn-primary">Save Form</button>
                
            </div>
            </nav>
       <!--- Editor--->
        <div class="form-editor">
            <div class="form-editor-left">
                <h4 class="drage-field-heading">Drag & Drop the fields here to create form.</h4>
            </div>
            <div class="form-editor-right">
                     <!--- Search form--->
                    <div class="search-button">
						<input type="text" class="search-button__input" placeholder="<?php echo esc_attr__( 'Search for a field' ); ?>">
						<span class="clear-button"></span>
					</div>
                    <div class="tab">
                        <button class="tablinks" onclick="openField(event, 'addfields')" id="defaultOpen">Add Fields</button>
                        <button class="tablinks" onclick="openField(event, 'fieldssettings')">Fields Settings</button>
                    </div>
                    <!--- Fields--->
                    <div id="addfields" class="tabcontent">
                        <div class="sidebar-instructions">
                            <p>Drag a field to the left to start building your form and then start configuring it.</p>
                        </div>
                        <!--- add accordion---> 
                         
                        <div class="fields-accordion">

                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingOne">
                                            <h4 class="panel-title">
                                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    <i class="more-less fa fa-angle-down "></i>
                                                  
                                                    Standard Fields
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                            <div class="panel-body">
                                             <ul class="standardfields">
                                                 <li>
                                                     <button value="Single Line" class="fields-button">
                                                     <div class="button-icon"><i class="fa fa-user"></i></div>
                                                     <div class="button-text">Name</div> 
                                                     </button>
                                                 </li>
                                                 <li>
                                                     <button value="Single Line" class="fields-button">
                                                     <div class="button-icon"><i class="fa fa-envelope"></i></div>
                                                     <div class="button-text">Email</div> 
                                                     </button>
                                                 </li>
                                                 <li>
                                                     <button value="Single Line" class="fields-button">
                                                     <div class="button-icon"><i class="fa fa-clock-o"></i></div>
                                                     <div class="button-text">Time</div> 
                                                     </button>
                                                 </li>
                                                 <li>
                                                     <button value="Single Line" class="fields-button">
                                                     <div class="button-icon"><i class="fa fa-phone"></i></div>
                                                     <div class="button-text">Phone</div> 
                                                     </button>
                                                 </li>

                                                 <li>
                                                     <button value="Single Line" class="fields-button">
                                                     <div class="button-icon"><i class="fa fa-phone"></i></div>
                                                     <div class="button-text">Phone</div> 
                                                     </button>
                                                 </li>

                                                 <li>
                                                     <button value="Single Line" class="fields-button">
                                                     <div class="button-icon"><i class="fa fa-phone"></i></div>
                                                     <div class="button-text">Phone</div> 
                                                     </button>
                                                 </li>

                                                 <li>
                                                     <button value="Single Line" class="fields-button">
                                                     <div class="button-icon"><i class="fa fa-phone"></i></div>
                                                     <div class="button-text">Phone</div> 
                                                     </button>
                                                 </li>

                                                 <li>
                                                     <button value="Single Line" class="fields-button">
                                                     <div class="button-icon"><i class="fa fa-phone"></i></div>
                                                     <div class="button-text">Phone</div> 
                                                     </button>
                                                 </li>
                                                 <li>
                                                     <button value="Single Line" class="fields-button">
                                                     <div class="button-icon"><i class="fa fa-phone"></i></div>
                                                     <div class="button-text">Phone</div> 
                                                     </button>
                                                 </li>
                                                 <li>
                                                     <button value="Single Line" class="fields-button">
                                                     <div class="button-icon"><i class="fa fa-phone"></i></div>
                                                     <div class="button-text">Phone</div> 
                                                     </button>
                                                 </li>
                                                 <li>
                                                     <button value="Single Line" class="fields-button">
                                                     <div class="button-icon"><i class="fa fa-phone"></i></div>
                                                     <div class="button-text">Phone</div> 
                                                     </button>
                                                 </li>
                                                 <li>
                                                     <button value="Single Line" class="fields-button">
                                                     <div class="button-icon"><i class="fa fa-phone"></i></div>
                                                     <div class="button-text">Phone</div> 
                                                     </button>
                                                 </li>
                                             </ul>
                                            </div>
                                        </div>
                                    </div>      
                                    
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingTwo">
                                            <h4 class="panel-title">
                                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseOne">
                                                    <i class="more-less fa fa-angle-down "></i>
                                                  
                                                    Advanced Fields
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                            <div class="panel-body">
                                            <ul class="add-buttons" >
                                            <li>
                                            <button title="Allows users to submit a single line of text." data-type="text" value="Single Line Text" class="btn btn-primary">
                                            <div class="button-icon"><i class="gform-icon gform-icon--single-line-text"></i></div>
                                            <div class="button-text">Single Line Text</div>
                                            </button>
			                                </li>
									       </ul>
                                            </div>
                                        </div>
                                    </div>

                            </div><!-- panel-group -->
                        </div><!--- End accordion--->
                    </div> <!--- fields--->
                    <!--- Fields settings--->
                    <div id="fieldssettings" class="tabcontent">
                        <h3>Settings</h3>
                        <p>Change settings.</p> 
                    </div>
                    <!--- Fields settings--->
            </div><!-- editor right sidebar--->
         </div> <!--- Editor--->

</div>    <!--- Container--->
