# LocalGov Elections Reporting

This module provides submodules, content types, views and configuration that allow the reporting of election results for
the LocalGov Drupal distribution.

## Features

- First past the post single seat per electoral area elections
- 'All-out' and not 'all-out' (e.g. halves or thirds) elections 
- Table, graph and map based views of the results
- Extensible boundary source provider for electoral areas and geo data
- Social media posting of results (currently Twitter / X)

## How to use

See the [Documentation](docs/index.md) for more details

## Installing

### Installation

You can install this module with the following composer command.

```
composer require localgovdrupal/localgov_elections_reporting
```

#### Libraries

The libraries required by Charts/Highcharts are included, by default via CDN. If you wish to have these locally follow the instructions at https://www.drupal.org/docs/contributed-modules/charts/50x-getting-started#s-using-composer-and-wikimediacomposer-merge-plugin which uses the `composer.json` provided by the Charts module to install. 

#### Submodules

You may also wish to use the submodules provided as part of the Localgov Election Reporting module. They are:

1. LocalGov Elections Reporting ONS Wards 2023 - Boundary source provider for Office of National Statistics 2023 Wards
2. Localgov Elections Parliamentary Constituency Provider - Boundary source provider for Office of National Statistics 2024 constituency boundaries
3. LocalGov Elections Reporting Social Post Integration - Post results to social media (Twitter/X)

Further details for these modules are in their own module READMEs and the [Documentation](docs/index.md).

## Issues

If you run into issues using this module, please report them
at https://github.com/localgovdrupal/localgov_elections_reporting/issues

## Maintainers

This project is currently maintained by:

- Chris Wales https://github.com/chriswales95
- Duncan Davidson https://github.com/dedavidson

It is based on work originally done by Rob Carr https://github.com/rgcarr.
