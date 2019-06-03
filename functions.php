<?php 

    function nav_item (string $link, string $title, string $linkClass = ''): string
    {
        $classes = 'nav-item';
        if ($link === $_SERVER['SCRIPT_NAME']) {
            // $classes = $classes . ' active';
            $classes .= ' active';
        }
        // return '<li class="'.$classes.'">
        //             <a class="nav-link" href="'.$link.'">'.$title.'</a>
        //         </li>';
            
        // Utilisation de Heredoc
        return <<<HTML
    <li class="$classes">
        <a class="$linkClass" href="$link">$title</a>
    </li>
HTML;
    }

    function nav_menu(string $linkClass = '') : string 
    {
        return 
        nav_item('/index.php', 'Accueil', $linkClass).
        nav_item('/menu.php', 'Menu', $linkClass).
        nav_item('/jeu.php', 'Jeu', $linkClass).
        nav_item('/glaces.php', 'Glace', $linkClass).
        nav_item('/contact.php', 'Contact', $linkClass);
    }


    function generateInputCheckbox(string $name, string $value, array $data) : string
    {
        $attributes = '';
        if(isset($data[$name]) && in_array($value, $data[$name]))
        {
            $attributes .= 'checked';
        }
        return <<<HTML
        <input type="checkbox" name="{$name}[]" value ="$value" $attributes>
HTML;
    }

    function generateInputRadiobox(string $name, string $value, array $data) : string
    {
        $attributes = ''; 
        if(isset($data[$name]) && $value === $data[$name])
        {
            $attributes .= 'checked';
        }
        return <<<HTML
        <input type="radio" name="{$name}" value ="$value" $attributes >
HTML;
    }

    function generateSelect(string $name, $value, array $options): string
    {
        $html_options = [];
        foreach ($options as $key => $option) {
            $attributes = $key == $value ? ' selected' : '';
            $html_options[] = "<option value='$key' $attributes >$option</option>"; 
        }

        return "<select class='form-control' name=$name>".implode($html_options). '</select>';
    }

    function dump($variable)
    {
        echo '<pre>';
        var_dump($variable);
        echo '</pre>';
    }

    function crenaux_html(array $crenaux) : string
    {
        if (empty($crenaux)) {
            return 'Fermé';
        }
        $tableaux = [];
        foreach ($crenaux as $value) 
        {
            $tableaux[] = " de <strong>{$value[0]}h</strong> à <strong>{$value[1]}h</strong>";
                
        }  
        return 'Ouvert'.implode(' et ', $tableaux);
        
    }

    function in_creneaux(int $heure, array $creneaux) : bool
    {
    
        foreach ($creneaux as $creneau) 
        {
            $debut = $creneau[0];
            $fin = $creneau[1];
            if ($heure >= $debut && $heure <= $fin)
            {
                return true;

            }
        }
        return false;
    }