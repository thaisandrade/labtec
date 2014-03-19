<?php
/**
 * Create by: nic
 * Create at: 16/05/13 - 12:01
 */

class BannerHelper extends AppHelper {
    public function generate($config) {
        /*
         $config = array(
            'reference_element' => 'allinone_bannerRotator',
            'skin' => 'classic',
            'width' => '784',
            'height' => '200',
            'imagem_grande_dir' => '/img/banner/',
            'imagem_pequena_dir' => '/img/banner/thumbs/',
            'content' => array(
                array(
                    'imagem' => 'nautica.jpg',
                    'alt' => 'Naútica',
                    'textos' => array(
                        'Linha Nautica' => array(
                            'pos_initial_left' => '50',
                            'pos_initial_top' => '10',
                            'pos_final_left' => '450',
                            'pos_final_top' => '40'
                        ),
                        'Texto <a href="#">link</a> mais texto' => array(
                            'pos_initial_left' => '50',
                            'pos_initial_top' => '10',
                            'pos_final_left' => '450',
                            'pos_final_top' => '90'
                        )
                    ),

                ),
                array(
                    'imagem' => 'cabides.jpg',
                    'alt' => 'Cabides',
                    'textos' => array(
                        'Cabides<br> texto' => array(
                            'pos_initial_left' => '550',
                            'pos_initial_top' => '60',
                            'pos_final_left' => '150',
                            'pos_final_top' => '60'
                        ),
                        'texto simples' => array(
                            'pos_initial_left' => '550',
                            'pos_initial_top' => '125',
                            'pos_final_left' => '190',
                            'pos_final_top' => '125'
                        )
                    ),
                ),
                array(
                    'imagem' => 'placas.jpg',
                    'alt' => 'Placa',
                    'textos' => array(
                        'Placas' => array(
                            'pos_initial_left' => '480',
                            'pos_initial_top' => '60',
                            'pos_final_left' => '50',
                            'pos_final_top' => '60'
                        ),
                        'Texto placas' => array(
                            'pos_initial_left' => '0',
                            'pos_initial_top' => '75',
                            'pos_final_left' => '50',
                            'pos_final_top' => '75'
                        ),
                        'mais texto' => array(
                            'pos_initial_left' => '50',
                            'pos_initial_top' => '250',
                            'pos_final_left' => '50',
                            'pos_final_top' => '110'
                        )
                    ),
                ),
                array(
                    'imagem' => 'relogio.jpg',
                    'alt' => 'Relogio',
                    'textos' => array(
                        'Relogios' => array(
                            'pos_initial_left' => '50',
                            'pos_initial_top' => '10',
                            'pos_final_left' => '450',
                            'pos_final_top' => '40'
                        ),
                        'texto relogios' => array(
                            'pos_initial_left' => '50',
                            'pos_initial_top' => '384',
                            'pos_final_left' => '50',
                            'pos_final_top' => '100'
                        )
                    ),
                ),
                array(
                    'imagem' => 'cachepos.jpg',
                    'alt' => 'Cachepos',
                    'textos' => array(
                        'Linha Cachepots' => array(
                            'pos_initial_left' => '400',
                            'pos_initial_top' => '350',
                            'pos_final_left' => '50',
                            'pos_final_top' => '52'
                        )
                    ),
                ),
            )
        );
        /**/



        $id_base_name = $config['reference_element'] . '_' . $config['skin'];
        $base_name = $config['reference_element'];
        $skin = $config['skin'];

        $out = "";

        $out .= "<script type=\"text/javascript\">" . "\n";
        $out .= "$(function () {" . "\n";
        $out .= "    $('#" . $id_base_name . "').allinone_bannerRotator({" . "\n";
        $out .= "        skin: 'classic'," . "\n";
        $out .= "        width: " . $config['width'] . "," . "\n";
        $out .= "        height: " . $config['height'] . "," . "\n";
        $out .= "        thumbsWrapperMarginBottom: 5," . "\n";
        $out .= "        defaultEffect: 'random'" . "\n";
        $out .= "    });" . "\n";
        $out .= "" . "\n";
        $out .= "});" . "\n";
        $out .= "</script>" . "\n";

        $out .= '<div id="' . $id_base_name . '" style="display:none;">' . "\n";
        $out .= '    <ul class="allinone_bannerRotator_list">' . "\n";
        //Para cada imagem
        $count = 1;
        foreach ($config['content'] as $content) {
            $out .= '        <li data-bottom-thumb="' . $config['imagem_pequena_dir'] . $content['imagem'] . '" data-text-id="#' . $base_name . '_photoText' . $count . '">' . "\n";
            $out .= '        <img src="' . $config['imagem_grande_dir'] . $content['imagem'] . '" alt="' . $content['alt'] . '"></li>' . "\n";
            $count++;
        }
        unset($count);
        $out .= '    </ul>' . "\n";


        //Para cada texto
        $count = 1;
        $subCount = 1;
        foreach ($config['content'] as $content) {
            $out .= '    <div id="' . $base_name . '_photoText' . $count . '" class="' . $base_name . '_texts">' . "\n";
            foreach ($content['textos'] as $text => $position) {
                $out .= '        <div class="' . $base_name . '_text_line textElement' . $count . $subCount . '_' . $skin . '" data-initial-left="' . $position['pos_initial_left'] . '"' . "\n";
                $out .= '             data-initial-top="' . $position['pos_initial_top'] . '" data-final-left="' . $position['pos_final_left'] . '" data-final-top="' . $position['pos_final_top'] . '" data-duration="0.5"' . "\n";
                $out .= '             data-fade-start="0" data-delay="0">' . $text . "\n";
                $out .= '        </div>' . "\n";
                $subCount++;
            }
            $out .= '    </div>' . "\n";
            $count++;
            $subCount = 1;
        }
        unset($count);
        unset($subCount);
        $out .= '</div>' . "\n";


        return $out;
    }

}