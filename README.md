![Code Analysis](https://github.com/Kerrialn/WTE/workflows/Code%20Analysis/badge.svg?branch=master)

# What The Error!

## Introduction
An error reference tool that explains errors to be understood by humans.

## Installation
- run `composer require kerrialn/wte --dev`

## Usage
 The example below will render the output of phpstan errors, replace the phpstan command with any you wish.
`bin/wte analyse -c"vendor/bin/phpstan analyse"` 
