<!DOCTYPE html>
<html>
    <head>
        <?= $this->Html->charset() ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            <?= $this->fetch('title') ?> - Megafone
        </title>
        <?= $this->Html->meta('megaicon.ico','/megaicon.ico', ['type' => 'icon']) ?>

        <?= $this->Html->css(['reset', 'style', 'cropper', 'media-queries']) ?>
        <?= $this->Html->script(['jquery.1.11.3.min', 'commonHandlers', 'script']) ?>

        <?= $this->fetch('meta') ?>
        <?= $this->fetch('css') ?>
        <?= $this->fetch('script') ?>
    </head>
    <body>
        <div id="super-overlay"></div>
        <header>
            <div id="top-header">
                <?php  $cell = $this->cell('Users'); ?>
                <?= $cell ?>
                <h1>Megafone</h1>
                <?= $this->Html->image('megafone.png', ['alt' => 'Megafone logo']); ?>
            </div>
            <nav class="<?= isset($class) ? $class : '' ?>">
                <ul>
                    <li><?= $this->Html->link(__('Home'), ['controller' => '', 'action' => '/'], ['class' => 'home']) ?></li>
                    <li><?= $this->Html->link(__('Users'), ['controller' => 'Users', 'action' => 'index'], ['class' => 'users']) ?></li>
                    <li><?= $this->Html->link(__('Categories'), ['controller' => 'Categories', 'action' => 'index'], ['class' => 'categories']) ?></li>
                    <li><?= $this->Html->link(__('Complaints'), ['controller' => 'Complaints', 'action' => 'index'], ['class' => 'complaints']) ?></li>
                    <li><?= $this->Html->link(__('About'), ['controller' => 'Pages', 'action' => 'display', 'about'], ['class' => 'about']) ?></li>
                </ul>
            </nav>
        </header>

        <?= $this->Flash->render() ?>

        <div id="main-content">
            <div id="content">
                <?= $this->fetch('content') ?>
            </div>
        </div>
        <footer>
            <div>
                <p>
                    <?= __('Online System for Complaints') ?> <br/>
                    <?= __('Siipe {0} - &copy; All rights reserved', date('Y')) ?>
                </p>
                <h1>Megafone</h1>
                <?= $this->Html->image('megafone-footer.png', ['alt' => 'Megafone footer']); ?>
            </div>
        </footer>
    </body>
</html>
