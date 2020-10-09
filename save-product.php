<div class="product-form__title">Material</div><div class="product-form__control"><div class="input-radio-label"><div class="input-radio-label__list"><label class="input-radio-label__item"><input type="radio" name="material" class="input-radio-label__input"> <span class="input-radio-label__title">Steel</span></label> <label class="input-radio-label__item"><input type="radio" name="material" class="input-radio-label__input"> <span class="input-radio-label__title">Aluminium</span></label> <label class="input-radio-label__item"><input type="radio" name="material" class="input-radio-label__input" disabled="disabled"> <span class="input-radio-label__title">Thorium</span></label></div></div></div></div>
                                                
                                                <div class="product-form__row"><div class="product-form__title">Color</div><div class="product-form__control"><div class="input-radio-color"><div class="input-radio-color__list"><label class="input-radio-color__item input-radio-color__item--white" style="color: #fff;" data-toggle="tooltip" title="White"><input type="radio" name="color"> <span></span></label> <label class="input-radio-color__item" style="color: #ffd333;" data-toggle="tooltip" title="Yellow"><input type="radio" name="color"> <span></span></label> <label class="input-radio-color__item" style="color: #ff4040;" data-toggle="tooltip" title="Red"><input type="radio" name="color"> <span></span></label> <label class="input-radio-color__item input-radio-color__item--disabled" style="color: #4080ff;" data-toggle="tooltip" title="Blue"><input type="radio" name="color" disabled="disabled"> <span></span></label></div></div></div></div>



                                                <div class="widget-products__item">
			<div class="widget-products__image">
				<a href="product-full?product_id=<?php echo $row['dpid']; ?>&product_name=<?php echo $row['dpname']; ?>&brand=<?php echo $row['dbrand']; ?>">
					<img style="width:20%" src="_product_images/<?php echo $row['dimg1']; ?>" alt="">
				</a>
			</div>
			<div class="widget-products__info">
				<div class="widget-products__name"><a href="product-full"><?php echo $row['dpname']; ?></a></div>
				<div class="widget-products__prices">
					<div class="widget-products__price widget-products__price--current">&#8358; <?php echo $row['dimg1']; ?></div>
				</div>
			</div>
		</div>