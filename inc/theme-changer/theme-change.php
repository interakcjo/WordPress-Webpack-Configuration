<?php
/* add change theme buttons */
if(is_admin()) {
	function theme_buttons() {
		// Create custom_theme meta in options table
		update_option('custom_theme', 'default-page');
		// Update theme with radio value
		if(isset($_POST['theme-change'])) {
			update_option('custom_theme', $_POST['theme-change']);
		}
		// Check active theme
		$active_theme = get_option('custom_theme');

		?>

		<div class="theme-change-buttons">
			<button class="theme-change-toggle" role="button" tabindex="0" title="Zmień na Świąteczny temat strony" aria-label="Zmień Motyw strony">Zmień Motyw strony</button>

			<form action="" method="POST" class="theme-change-form">
				<div class="theme-change-form__row">
					<input id="default-page" type="radio" data-name="Domyślny" class="theme-change-form__input" name="theme-change" value="default-page" <?php if($active_theme === 'default-page'): ?>checked<?php endif; ?>>
					<label for="default-page" class="theme-change-form__label">Domyślny</label>
				</div>

				<div class="theme-change-form__row">
					<input id="christmas-page" type="radio" data-name="Świąteczny" class="theme-change-form__input" name="theme-change" value="christmas-page" <?php if($active_theme === 'christmas-page'): ?>checked<?php endif; ?>>
					<label for="christmas-page" class="theme-change-form__label">Świąteczny</label>
				</div>

				<div class="theme-change-form__row">
					<input disabled id="easter-page" type="radio" data-name="Wielkanocny" class="theme-change-form__input" name="theme-change" value="easter-page" <?php if($active_theme === 'easter-page'): ?>checked<?php endif; ?>>
					<label for="easter-page" class="theme-change-form__label">Wielkanocny</label>
				</div>

				<div class="theme-change-form__row">
					<input disabled id="mourning-page" type="radio" data-name="Żałobny" class="theme-change-form__input" name="theme-change" value="mourning-page" <?php if($active_theme === 'mourning-page'): ?>checked<?php endif; ?>>
					<label for="mourning-page" class="theme-change-form__label">Żałobny</label>
				</div>

				<button class="button button-primary theme-change-form__submit" type="submit">Zapisz motyw</button>
			</form>
		</div>

			<script src="<?php echo get_template_directory_uri(); ?>/theme-change/changeTheme.js"></script>
			<style>
				.theme-change-form {
					display: flex;
					align-items: center;
				}
				.theme-change-form__row {
					padding: 20px 0;
				}
				.theme-change-form__label,.theme-change-toggle {
					padding: 15px 25px;
					cursor: pointer;
					border: 0;
					font-weight: bold;
					color: white;
					text-transform: uppercase;
				}
				.theme-change-form input[type="radio"] {
					display: none;
				}
                .theme-change-form__row {
                    margin: 10px;
                }
				.theme-change-toggle {
					background-color: #006caa;
					margin-bottom: 15px
				}
				.theme-change-form__label[for="default-page"] {
					background-color: SteelBlue;
				}
				.theme-change-form__label[for="christmas-page"] {
					background-color: red;
				}
				.theme-change-form__label[for="easter-page"] {
					background-color: green;
				}
				.theme-change-form__label[for="mourning-page"] {
					background-color: grey;
				}
				.theme-change-form {
					max-height: 0;
					overflow: hidden;
					transition: all .5s ease-in-out;
				}
				.theme-change-form.active {
					max-height: 600px;
				}
				.theme-change-form__input:checked + .theme-change-form__label {
					outline: 2px dashed red;
					outline-offset: 5px;
				}
			</style>
		<?php
	}
	add_action('welcome_panel', 'theme_buttons');
}
?>