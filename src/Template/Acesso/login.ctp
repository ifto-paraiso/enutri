<div class="login-box">
  <div class="login-logo">
      <b>E</b>nutri
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Informe os seus dados de acesso</p>

    <form method="post">
      <div class="form-group has-feedback">
          <input name="email" type="email" class="form-control" placeholder="Email" autofocus="autofocus">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
          <input name="senha" type="password" class="form-control" placeholder="Senha">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block">
              <?= $this->Icon->make('salvar') ?>
              Entrar
          </button>
        </div>
        <!-- /.col -->
      </div>
    </form>

  </div>
  
  <br />
  
  <?= $this->Flash->render() ?>
  <!-- /.login-box-body -->
</div>