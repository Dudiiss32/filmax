# Configuração do Tailwind CSS e Heroicons

## ✅ O que foi configurado

1. **Tailwind CSS v4** - Já estava instalado e foi configurado corretamente
2. **Heroicons** - Instalado e configurado com componentes Blade reutilizáveis
3. **Configuração do Vite** - Atualizada para carregar o CSS corretamente
4. **Componente de ícones** - Criado para facilitar o uso dos Heroicons

## 🚀 Como usar

### 1. Compilar os assets

```bash
npm run dev    # Para desenvolvimento
npm run build  # Para produção
```

### 2. Usar o Tailwind CSS

O Tailwind CSS já está configurado e funcionando. Você pode usar todas as classes utilitárias diretamente nas suas views Blade:

```html
<div class="bg-blue-500 text-white p-4 rounded-lg shadow-md">
    <h1 class="text-2xl font-bold">Título</h1>
    <p class="text-blue-100">Descrição</p>
</div>
```

### 3. Usar os Heroicons

#### Opção 1: Componente Blade (Recomendado)

```html
<!-- Ícone básico -->
<x-hero-icon name="home" />

<!-- Ícone com tamanho personalizado -->
<x-hero-icon name="search" class="w-6 h-6" />

<!-- Ícone com cor personalizada -->
<x-hero-icon name="heart" class="w-8 h-8 text-red-500" />
```

#### Ícones disponíveis:
- `home` - Ícone de casa
- `user` - Ícone de usuário
- `search` - Ícone de busca
- `menu` - Ícone de menu (hambúrguer)
- `close` - Ícone de fechar (X)
- `star` - Ícone de estrela
- `heart` - Ícone de coração
- `play` - Ícone de play

#### Opção 2: SVG direto

Se preferir usar os SVGs diretamente, você pode copiar o código SVG do componente `hero-icon.blade.php`.

### 4. Exemplo completo

Veja o arquivo `resources/views/examples/tailwind-demo.blade.php` para um exemplo completo de como usar o Tailwind CSS e os ícones juntos.

## 📁 Arquivos criados/modificados

- `tailwind.config.js` - Configuração do Tailwind CSS
- `resources/css/app.css` - CSS principal com diretivas do Tailwind
- `resources/js/app.js` - JavaScript principal com importação do CSS
- `resources/views/components/hero-icon.blade.php` - Componente de ícones
- `resources/views/examples/tailwind-demo.blade.php` - Exemplo de uso

## 🎨 Personalização

### Adicionar novos ícones

Para adicionar novos ícones, edite o arquivo `resources/views/components/hero-icon.blade.php` e adicione novos casos no switch:

```php
@case('novo-icone')
    <svg class="{{ $iconClass }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <!-- SVG path aqui -->
    </svg>
    @break
```

### Personalizar o tema

Edite o arquivo `tailwind.config.js` para personalizar cores, fontes e outros aspectos do tema:

```javascript
theme: {
  extend: {
    colors: {
      'filmax': '#6366f1',
    },
    fontFamily: {
      sans: ['Sua Fonte', 'sans-serif'],
    },
  },
},
```

## 🔧 Comandos úteis

```bash
# Instalar dependências
npm install

# Desenvolvimento (watch mode)
npm run dev

# Build para produção
npm run build

# Ver dependências instaladas
npm list
```

## 📱 Responsividade

O Tailwind CSS inclui classes responsivas por padrão:

```html
<div class="text-sm md:text-base lg:text-lg">
    Texto responsivo
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
    Grid responsivo
</div>
```

## 🎯 Próximos passos

1. Execute `npm run dev` para compilar os assets
2. Teste a página de exemplo: `resources/views/examples/tailwind-demo.blade.php`
3. Comece a estilizar suas views existentes com as classes do Tailwind
4. Use os componentes de ícones para melhorar a interface

## ❓ Problemas comuns

### CSS não está carregando
- Verifique se o Vite está rodando (`npm run dev`)
- Confirme se o `@vite` está incluído na view
- Verifique o console do navegador para erros

### Ícones não aparecem
- Confirme se o componente `hero-icon` está sendo usado corretamente
- Verifique se o nome do ícone está correto
- Confirme se a view está estendendo o layout correto

### Tailwind não funciona
- Execute `npm run build` para verificar se há erros
- Confirme se o `tailwind.config.js` está na raiz do projeto
- Verifique se o CSS está sendo importado no JavaScript
