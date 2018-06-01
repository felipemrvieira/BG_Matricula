<?php
/**
 * Created by PhpStorm.
 * User: GlaucoT
 * Date: 07/10/2015
 * Time: 11:32
 */
?>
<style>
    .navbar {
        margin-bottom: 0 !important;
    }
</style>

<nav class="navbar">
    <div class="container">
        <a class="navbar-brand" href="<?php echo base_url() ?>">
            <img class="brand" src="<?php echo base_url() . 'assets/img/logo_Positivo.png' ?>"/>
        </a>

        <div class="pull-right">
            <form action="<?php echo base_url() . 'index.php/ClienteController/logar' ?>" method="post">
                <?php
                if (isset($_COOKIE['chave'])) {
                    echo '<input type="hidden" name="chave" value="' . $chave . '">';
                }
                if (isset($_COOKIE['codEmpresa'])) {
                    echo '<input type="hidden" name="codEmpresa" value="' . $codEmpresa . '">';
                }
                ?>

                <button type="submit" class="pull-right btn btn-primary btn-sm botao-sair"
                        style="margin-top:30px;font-size: 12px; padding: 5px 10px 5px 10px;">Logar
                </button>
            </form>
        </div>

    </div>
</nav>