<nav class="navbar navbar-expand-lg navbar-light bg-light mb-3">
    <div class="container-fluid">
        <?= $this->Menu->link('Menus', '/', [
            'class' => 'navbar-brand'
        ]); ?>
        <!-- <a class="navbar-brand" href="#">Navbar</a> -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <?= $this->Menu->link('Home', '/', [
                        'class' => 'nav-link active',
                        'aria-current' => "page"
                    ]); ?>
                    <!-- <a class="nav-link active" aria-current="page" href="#">Home</a> -->
                </li>
                <?php foreach ($menuTree as $menu) : ?>
                    <?php if ($menu->hasValue('children')) : ?>
                        <li class="nav-item dropdown">
                            <?= $this->Menu->link($menu->name, $menu->url, [
                                'class' => 'nav-link dropdown-toggle',
                                'id' => "navbarDropdown-{$menu->id}",
                                'role' => "button",
                                'data-bs-toggle' => "dropdown",
                                'aria-expanded' => "false"
                            ]); ?>
                            <!-- <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Dropdown
                            </a> -->
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown-<?= $menu->id; ?>">

                                <?php foreach ($menu['children'] as $childMenu) : ?>
                                    <?php $disabled = $childMenu->disabled ? "disabled" : ''; ?>
                                    <?php if ($childMenu['divider_before']) : ?>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                    <?php endif; ?>
                                    <li><?= $this->Menu->link(
                                            $childMenu->name,
                                            $childMenu->url,
                                            [
                                                'class' => 'dropdown-item' . ' ' . $disabled
                                            ]
                                        ); ?>
                                    </li>
                                <?php endforeach; ?>
                                <!-- <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                               
                                <li><a class="dropdown-item" href="#">Something else here</a></li> -->
                            </ul>
                        </li>
                    <?php else : ?>
                        <li class="nav-item">
                            <?php $disabled = $menu->disabled ? "disabled" : ''; ?>
                            <?= $this->Menu->link($menu->name, $menu->url, [
                                'class' => 'nav-link' . ' ' . $disabled
                            ]); ?>
                            <!-- <a class="nav-link" href="#">Link</a> -->
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</nav>