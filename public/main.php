<?
    $path = $_SERVER['DOCUMENT_ROOT'];
	require_once "$path/system/functions.php";
	require_once "$path/system/script.php";
    require_once "$path/private/head.php";

?>

<body>
	 <div class="cont">
	 <? require_once "$path/private/header.php"; ?>
	<div class="page">
		<div class="left">
			<select name="books" id="books">
				<option value="">genre</option>
				<option value="adventure">adventure</option>
				<option value="drama">drama</option>
			</select>
		</div>
		<div class="right">
			<h2>Manga</h2>
			<div class="book-wrapper">
				<?
					$books = getAllBooks();
					foreach ($books as $book) {
						?>
							<div class="book">
								<div class="left">
									<img src="<? echo $book['picture']?>" alt="book cover">
								</div>
								<div class="right">
									<p class="book_id">book id: <? echo $book['book_id']?></p>
									<p class="author_id">author id: <? echo $book['author_id']?></p>
									<p class="name">title: <? echo $book['name']?></p>
									<p class="added_on">added on: <? echo $book['added_on']?></p>
								</div>
							</div>

						<?
					}
				?>
			</div>
		</div>
	</div>
	 <? require_once "$path/private/footer.php"; ?>
	 </div>
</body>
<? require_once "$path/private/js_script.php";?>
</html>
