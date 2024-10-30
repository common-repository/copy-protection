<?php function cp_disable_cklick (){ ?>

		<script language="javascript">
		//////////Block Mouse////////////////////////

		document.onmousedown=disableclick;
		status="<?php if (get_option( 'disable_right_cklick_text' )) : echo get_option( 'disable_right_cklick_text' ); else : echo "Copy Protection "; endif; ?>";
		function disableclick(event)
		{
		  if(event.button==2)
		   {
			 alert(status);
			 return false;    
		   }
		}
		</script>
		<script>
			window.oncontextmenu = function () {
				console.log("");
				return false;
			}
		</script>

		<?php
	}

	add_action("wp_head", "cp_disable_cklick");

