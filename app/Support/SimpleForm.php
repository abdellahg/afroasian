<?php

namespace App\Support;

class SimpleForm
{
    /**
     * Holds the current bound model for Form::model() sessions.
     */
    protected static $model = null;

    protected static function attrs(array $attributes): string
    {
        $parts = [];
        foreach ($attributes as $key => $value) {
            if ($value === null || $value === false) {
                continue;
            }
            if ($value === true) {
                $parts[] = htmlspecialchars($key, ENT_QUOTES, 'UTF-8');
            } else {
                $parts[] = sprintf('%s=\"%s\"', htmlspecialchars($key, ENT_QUOTES, 'UTF-8'), htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8'));
            }
        }
        return $parts ? ' ' . implode(' ', $parts) : '';
    }

    public static function open(array $options = []): string
    {
        $method = strtoupper($options['method'] ?? 'POST');
        $files = (bool)($options['files'] ?? false);
        $attributes = $options['attributes'] ?? [];

        // Determine action URL
        $action = $options['url'] ?? null;
        if (isset($options['route'])) {
            $route = $options['route'];
            $action = is_array($route) ? route(array_shift($route), $route) : route($route);
        } elseif (isset($options['action'])) {
            $act = $options['action'];
            $action = is_array($act) ? action(array_shift($act), $act) : action($act);
        } elseif ($action !== null && is_array($action)) {
            $action = url(...$action);
        } elseif ($action !== null) {
            $action = url($action);
        } else {
            $action = url()->current();
        }

        $spoof = '';
        if (!in_array($method, ['GET','POST'])) {
            $spoof = '<input type=\"hidden\" name=\"_method\" value=\"'.htmlspecialchars($method, ENT_QUOTES, 'UTF-8').'\" />';
            $method = 'POST';
        }

        // Collect any extra options as attributes (LaravelCollective compatibility)
        $known = ['method','files','attributes','url','route','action'];
        foreach ($options as $k => $v) {
            if (!in_array($k, $known, true)) {
                $attributes[$k] = $v;
            }
        }

        $baseAttrs = [
            'method' => $method,
            'action' => $action,
            'accept-charset' => 'UTF-8',
        ];
        if ($files) {
            $baseAttrs['enctype'] = 'multipart/form-data';
        }
        $attrs = array_merge($baseAttrs, $attributes);
        return '<form'.self::attrs($attrs).'>'.$spoof.csrf_field();
    }

    /**
     * Open a form and bind a model so inputs with null values use model attributes.
     */
    public static function model($model, array $options = []): string
    {
        self::$model = $model;
        return self::open($options);
    }

    public static function close(): string
    {
        $html = '</form>';
        // Reset model binding after closing the form
        self::$model = null;
        return $html;
    }

    public static function text(string $name, $value = null, array $attributes = []): string
    {
        $modelVal = self::$model !== null ? data_get(self::$model, $name) : null;
        $val = old($name, $value !== null ? $value : $modelVal);
        $attributes = array_merge(['name' => $name, 'type' => 'text', 'value' => $val], $attributes);
        return '<input' . self::attrs($attributes) . ' />';
    }

    public static function email(string $name, $value = null, array $attributes = []): string
    {
        $modelVal = self::$model !== null ? data_get(self::$model, $name) : null;
        $val = old($name, $value !== null ? $value : $modelVal);
        $attributes = array_merge(['name' => $name, 'type' => 'email', 'value' => $val], $attributes);
        return '<input' . self::attrs($attributes) . ' />';
    }

    public static function number(string $name, $value = null, array $attributes = []): string
    {
        $modelVal = self::$model !== null ? data_get(self::$model, $name) : null;
        $val = old($name, $value !== null ? $value : $modelVal);
        $attributes = array_merge(['name' => $name, 'type' => 'number', 'value' => $val], $attributes);
        return '<input' . self::attrs($attributes) . ' />';
    }

    public static function password(string $name, array $attributes = []): string
    {
        $attributes = array_merge(['name' => $name, 'type' => 'password'], $attributes);
        return '<input' . self::attrs($attributes) . ' />';
    }

    public static function hidden(string $name, $value = null, array $attributes = []): string
    {
        $modelVal = self::$model !== null ? data_get(self::$model, $name) : null;
        $val = old($name, $value !== null ? $value : $modelVal);
        $attributes = array_merge(['name' => $name, 'type' => 'hidden', 'value' => $val], $attributes);
        return '<input' . self::attrs($attributes) . ' />';
    }

    public static function file(string $name, array $attributes = []): string
    {
        $attributes = array_merge(['name' => $name, 'type' => 'file'], $attributes);
        return '<input' . self::attrs($attributes) . ' />';
    }

    public static function textarea(string $name, $value = null, array $attributes = []): string
    {
        $modelVal = self::$model !== null ? data_get(self::$model, $name) : null;
        $val = old($name, $value !== null ? $value : $modelVal);
        $attributes = array_merge(['name' => $name], $attributes);
        $content = htmlspecialchars((string) $val, ENT_QUOTES, 'UTF-8');
        return '<textarea' . self::attrs($attributes) . '>' . $content . '</textarea>';
    }

    public static function select(string $name, array $list = [], $selected = null, array $attributes = []): string
    {
        $modelVal = self::$model !== null ? data_get(self::$model, $name) : null;
        $sel = old($name, $selected !== null ? $selected : $modelVal);
        $isMultiple = isset($attributes['multiple']) && $attributes['multiple'];
        $attributes = array_merge(['name' => $name], $attributes);
        $optionsHtml = '';
        foreach ($list as $value => $label) {
            // Support numeric-indexed arrays
            if (is_int($value)) {
                $value = $label;
            }
            if (is_array($sel)) {
                $isSelected = in_array((string)$value, array_map('strval', $sel), true) ? ' selected' : '';
            } else {
                $isSelected = (string)$value === (string)$sel ? ' selected' : '';
            }
            $optionsHtml .= sprintf('<option value=\"%s\"%s>%s</option>',
                htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8'),
                $isSelected,
                htmlspecialchars((string)$label, ENT_QUOTES, 'UTF-8')
            );
        }
        return '<select' . self::attrs($attributes) . '>' . $optionsHtml . '</select>';
    }

    public static function label(string $for, string $text = null, array $attributes = []): string
    {
        $attributes = array_merge(['for' => $for], $attributes);
        $content = htmlspecialchars((string)($text ?? $for), ENT_QUOTES, 'UTF-8');
        return '<label' . self::attrs($attributes) . '>' . $content . '</label>';
    }
}
