<!DOCTYPE html>
    <html lang="en">
      <head>
        <meta charset="utf-8">
        <title>Example 1</title>
        <link rel="stylesheet" href="<?=base_url();?>assets/css/estiloPDF.css" media="all" />
      </head>
      <body>
        <header class="clearfix">
          <div id="logo">
          <h1>iPostal</h1>
            <img src="<?=base_url().$imagen?>">
          </div>
          
          <div id="company" class="clearfix">
            <div>iPostal</div>
            <div>ESCOM,<br /> IPN, CDMX US</div>
            <div>Tel: 55-77862650</div>
            <div><a href="mailto:company@example.com">iPostal@gmail.com</a></div>
          </div>
          <div id="project">
            <div><span>PROJECT</span> Website development</div>
            <div><span>CLIENTE</span><?=$nombre?></div>
            <div><span>EMAIL</span><?=$email;?></div>
            <div><span>FECHA</span> August 17, 2015</div>
          </div>
        </header>
        <main>
          <table>
            <thead>
              <tr>
                <th class="service">Usuario</th>
                <th class="desc">Mensaje</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="service">Design</td>
                <td class="desc">Creating a recognizable design solution based on the companys existing visual identity</td>
                             </tr>
            </tbody>
          </table>
          <div id="notices">
            <div>NOTICE:</div>
            <div class="notice">ipostal</div>
          </div>
        </main>
        <footer>
        iPostal no se hace responsable de los mensajes que aqí se transmiten
        </footer>
      </body>
    </html>