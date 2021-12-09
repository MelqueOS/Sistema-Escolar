<html>
	<head>
		<title>@yield("titulo")</title>
	</head>
	<body>
			@if(Session::get("status") == "salvo")
			<div class = "alert alert-success" role = "alert">
				<strongs>Salvo com sucesso</strongs>
			</div>
			@endif
			
			@if(Session::get("status") == "atualizado")
			<div class = "alert alert-sucess" role = "alert"> 
				<strongs>Atualizado com sucesso</strongs>
			</div>
			@endif
			@if(Session::get("status") == "adicionado")
			<div class = "alert alert-sucess" role = "alert"> 
				<strongs>Adicionado a coleção</strongs>
			</div>
			@endif
			@if(Session::get("status") == "excluido")
			<div class = "alert alert-danger" role = "alert"> 
				<strongs>Excluido com sucesso</strongs>
			</div>
			@endif
			@if(Session::get("status") == "erro_exc")
			<div class = "alert alert-error" role = "alert"> 
				<strongs>Não foi possivel exluir o item. Existem elementos que dependem dele</strongs>
			</div>
			@endif
			
			@yield("extra")
			@yield("cadastro")
			@yield("listagem")
	</body>
</html>