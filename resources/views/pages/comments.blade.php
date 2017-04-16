	<div class="row">
	<!-- Contenedor Principal -->
    <div class="comments-container">
		<ul id="comments-list" class="comments-list">
			<li>
				<div class="comment-main-level">
					<!-- Avatar -->
					<div class="comment-avatar"><img src="https://cdn3.iconfinder.com/data/icons/rcons-user-action/32/boy-512.png" alt=""></div>
					<!-- Contenedor del Comentario -->
					<div class="comment-box">
						<div class="comment-head">
							<h6 class="comment-name by-author"><a href="http://creaticode.com/blog">{{$comment->name}}</a></h6>
							<span>{{$comment->created_at->diffForHumans()}}</span>
							<i class="fa fa-reply"></i>
							<i class="fa fa-heart"></i>
						</div>
						<div class="comment-content">
							{{$comment->comment}}
						</div>
					</div>
				</div>
				<!-- Respuestas de los comentarios -->
			</li>
			
		</ul>
	</div>
	</div>