<HTML>
	<HEAD>
		<TITLE>Lista de Usuarios</TITLE>
	</HEAD>
	<BODY>
		<?php
		function llenarTabla(){
			$db = mysql_connect("localhost", "root", "");
			mysql_select_db("restaurant",$db);
			$res=mysql_query("SELECT * FROM usuarios", $db);

			while($row=mysql_fetch_row($res)){
				echo "<TR>";
				echo "<TD>".$row[1]."</TD>";	
				echo "<TD>".$row[2]."</TD>";	
				echo "<TD>".$row[3]."</TD>";	
				echo "<TD>".$row[4]."</TD>";	
				echo "<TD>".$row[5]."</TD>";	
				echo "</TR>";
				
			}
		}
		?>

		<CENTER><H1>Lista de Usuarios</H1>

		<FORM NAME="Datos" Method="POST" Action="listaUsuarios.php">
			Buscar: <INPUT TYPE=Text NAME="buscar" VALUE=""><BR>
			<INPUT TYPE=Submit NAME="Buscar" VALUE="Buscar"><DD></DD>
		</FORM>

		<?php
			function llenarTablaBusqueda(){
			$buscar = $_POST["buscar"];
			$db = mysql_connect("localhost", "root", "");
			mysql_select_db("restaurant",$db);
			$res=mysql_query("SELECT * FROM usuarios WHERE Nombre like '%$buscar%'", $db);
			while($row=mysql_fetch_row($res)){
				echo "<TR>";
				echo "<TD>".$row[1]."</TD>";	
				echo "<TD>".$row[2]."</TD>";	
				echo "<TD>".$row[3]."</TD>";	
				//echo "<TD>".$row[4]."</TD>";	
				//echo "<TD>".$row[5]."</TD>";	
				echo "</TR>";
				
			}
		}
		
		
		?>
			<TABLE BORDER=3>
				<TR>
					<TD>Login</TD>
					<TD>Nombre</TD>
					<TD>CI</TD>
					<TD></TD>
					<TD></TD>
				</TR>
				<?php
				if(isset($_POST["Buscar"]))
				{
					llenarTablaBusqueda();
				}else{ 
					llenarTabla(); 
				}
				?>
			</TABLE>
			<BR><BR>
			<FORM Action="crearUsuario.php">
				<INPUT TYPE=Submit NAME="Insertar" VALUE="Insertar">
			</FORM>
		</CENTER>
	</BODY>
</HTML>