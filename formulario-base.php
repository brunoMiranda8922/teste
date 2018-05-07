		<tr>
				<td>Nome:</td>
				<td><input class="form-control" type="text" name="nome" value="<?= $produto->getNome() ?>"></td>
			</tr>

			<tr> 	
				<td>Preco:</td>
				<td><input class="form-control" type="number" name="preco" value="<?= $produto->getPreco() ?>"></br></td>
			</tr>
			
			<tr> 
				<td>Descricão:</td>
				<td><textarea class="form-control" name="descricao"><?= $produto->getDescricao() ?></textarea></br></td>
			</tr> 
			
			<tr>
				<td></td>
				<td><input type="checkbox" name="usado" <?=$usado ?> value="true"> Usado</td>
			</tr>						    
			<tr>
				<td>Categoria</td>
				<td>
				    <select name="categoria_id" class="form-control">
					<option disabled selected> Selecione uma categoria </option>
				    <?php foreach ($categorias as $categoria) { 
                        $categoriaSelecioda = $produto->getCategoria()->getId() == $categoria->getId();    
                        $selecao = $categoriaSelecioda ? "selected='selected'" : ""; 
                    ?>
                        <option value="<?= $categoria->getId() ?>" <?= $selecao?>><?= $categoria->getNome() ?> </br> </option>
                    <?php } ?>
				    </select>	
				</td>
			</tr> 
			<tr>
				<td>Tipo do Produto</td>
				<td>
				    <select name="tipoProduto" class="form-control">
					<option disabled selected> Selecione um tipo </option>
					<?php
						$tipos = array("Produto", "Livro");
				    	foreach ($tipos as $tipo) { 
						$tipoProdutoSelecionado = get_class($produto) == $tipo;    
                        $selecao = $tipoProdutoSelecionado ? "selected='selected'" : ""; 
                    ?>
                        <option value="<?= $tipo ?>" <?= $selecao?>><?= $tipo ?> </br> </option>
                    <?php } ?>
				    </select>	
				</td>
			</tr>
			<tr>
			   <td>ISBN </td>
			   <td><input type="text" name="isbn" value="<?php if($produto->temIsbn()) { echo $produto->getIsbn(); }?> " class="form-control"></td>
			</tr>