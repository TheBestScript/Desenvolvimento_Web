<?php

function criarFormulario($formulario) {
    echo "<form action='" . htmlspecialchars($formulario["url_submit"]) . "' method='" . htmlspecialchars($formulario["tipo_submit"]) . "'>\n";
    foreach ($formulario["itens"] as $id => $item) {
        criarCampo($id, $item);
    }
    echo "</form>\n";
}

function criarCampo($id, $item) {
    echo "<div>\n";
    echo "<label for='" . htmlspecialchars($id) . "'>" . htmlspecialchars($item['label']) . "</label>\n";

    switch ($item['tipo']) {
        case 'text':
        case 'number':
            criarInputText($id, $item);
            break;
        case 'textarea':
            criarTextarea($id, $item);
            break;
        case 'select':
            criarSelect($id, $item);
            break;
        case 'radio':
            criarRadio($id, $item);
            break;
        case 'checkbox':
            criarCheckbox($id, $item);
            break;
        case 'submit':
            criarBotao($id, $item, 'submit');
            break;
        case 'reset':
            criarBotao($id, $item, 'reset');
            break;
        case 'button':
            criarBotao($id, $item, 'button');
            break;
        default:
            echo "Tipo de campo não suportado.";
    }

    echo "</div>\n";
}

function criarInputText($id, $item) {
    $placeholder = isset($item['placeholder']) ? "placeholder='" . htmlspecialchars($item['placeholder']) . "'" : '';
    $obrigatorio = !empty($item['obrigatorio']) ? 'required' : '';
    echo "<input type='" . htmlspecialchars($item['tipo']) . "' id='" . htmlspecialchars($id) . "' name='" . htmlspecialchars($item['nome']) . "' $placeholder value='" . htmlspecialchars($item['valor_padrao']) . "' $obrigatorio />\n";
}

function criarTextarea($id, $item) {
    $obrigatorio = !empty($item['obrigatorio']) ? 'required' : '';
    echo "<textarea id='" . htmlspecialchars($id) . "' name='" . htmlspecialchars($item['nome']) . "' $obrigatorio>" . htmlspecialchars($item['valor_padrao']) . "</textarea>\n";
}

function criarSelect($id, $item) {
    $obrigatorio = !empty($item['obrigatorio']) ? 'required' : '';
    echo "<select id='" . htmlspecialchars($id) . "' name='" . htmlspecialchars($item['nome']) . "' $obrigatorio>\n";
    foreach ($item['opcoes'] as $opcao) {
        $selected = ($opcao['valor'] == $item['valor_padrao']) ? 'selected' : '';
        echo "<option value='" . htmlspecialchars($opcao['valor']) . "' $selected>" . htmlspecialchars($opcao['texto']) . "</option>\n";
    }
    echo "</select>\n";
}

function criarRadio($id, $item) {
    foreach ($item['opcoes'] as $opcao) {
        $checked = (in_array($opcao['valor'], (array)$item['valor_padrao'])) ? 'checked' : '';
        echo "<input type='radio' id='" . htmlspecialchars($id . "_" . $opcao['valor']) . "' name='" . htmlspecialchars($item['nome']) . "' value='" . htmlspecialchars($opcao['valor']) . "' $checked />\n";
        echo "<label for='" . htmlspecialchars($id . "_" . $opcao['valor']) . "'>" . htmlspecialchars($opcao['texto']) . "</label>\n";
    }
}

function criarCheckbox($id, $item) {
    foreach ($item['opcoes'] as $opcao) {
        $checked = (in_array($opcao['valor'], (array)$item['valor_padrao'])) ? 'checked' : '';
        echo "<input type='checkbox' id='" . htmlspecialchars($id . "_" . $opcao['valor']) . "' name='" . htmlspecialchars($item['nome']) . "[]' value='" . htmlspecialchars($opcao['valor']) . "' $checked />\n";
        echo "<label for='" . htmlspecialchars($id . "_" . $opcao['valor']) . "'>" . htmlspecialchars($opcao['texto']) . "</label>\n";
    }
}

function criarBotao($id, $item, $tipo) {
    echo "<button type='$tipo' id='" . htmlspecialchars($id) . "' name='" . htmlspecialchars($item['nome']) . "'>" . htmlspecialchars($item['label']) . "</button>\n";
}

// exemplo de uso
$formulario = [
    "url_submit" => "processar.php",
    "tipo_submit" => "POST",
    "itens" => [
        "nome" => [
            "tipo" => "text",
            "nome" => "nome",
            "label" => "Nome",
            "placeholder" => "Digite seu nome",
            "valor_padrao" => "",
            "obrigatorio" => true,
        ],
        "idade" => [
            "tipo" => "number",
            "nome" => "idade",
            "label" => "Idade",
            "placeholder" => "Digite sua idade",
            "valor_padrao" => "",
            "obrigatorio" => true,
        ],
        "descricao" => [
            "tipo" => "textarea",
            "nome" => "descricao",
            "label" => "Descrição",
            "placeholder" => "Digite uma descrição",
            "valor_padrao" => "",
            "obrigatorio" => true,
        ],
        "genero" => [
            "tipo" => "select",
            "nome" => "genero",
            "label" => "Gênero",
            "opcoes" => [
                ["valor" => "masculino", "texto" => "Masculino"],
                ["valor" => "feminino", "texto" => "Feminino"],
            ],
            "valor_padrao" => "masculino",
            "obrigatorio" => true,
        ],
        "termos" => [
            "tipo" => "checkbox",
            "nome" => "termos",
            "label" => "Aceito os termos",
            "opcoes" => [
                ["valor" => "sim", "texto" => "Sim"],
            ],
            "valor_padrao" => [],
            "obrigatorio" => true,
        ],
        "enviar" => [
            "tipo" => "submit",
            "nome" => "enviar",
            "label" => "Enviar",
        ],
    ],
];

criarFormulario($formulario);

?>
