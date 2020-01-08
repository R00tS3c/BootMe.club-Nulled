<?php

	ob_start(); 
	require_once '../app/config.php';
	require_once '../app/init.php'; 

	if (!($user->LoggedIn()) || !($user->notBanned($odb)) || !($user -> isSupport($odb)) || !(isset($_SERVER['HTTP_REFERER']))) {
		die();
	}
?>                        <div class="col-lg-6">                          
                            <div class="block block-themed">
                                <div class="block-header bg-primary">                                 
                                    <h3 class="block-title">
										Conversation
									</h3>
                                </div>
                                <div class="block-content">
									<blockquote>
										<h5><?php echo $original; ?></h5>
										<footer><?php echo $username . ' [ ' . $date . ' ]'; ?></footer>
									</blockquote>
									<div id="response"></div>
                                </div>
                            </div>                          
                        </div>