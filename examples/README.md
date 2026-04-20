# signNow PHP SDK Examples

## Setup

1. See the configuration template example for reference:

```bash
vim examples/signnow-example-config.php.example
```

Start from an empty template:

```bash
cp examples/signnow-example-config.php.empty examples/signnow-example-config.php
```

2. Edit `examples/signnow-example-config.php` with your signNow API credentials and actual resource IDs.

> `signnow-example-config.php` is git-ignored and will not be committed.

## Running examples

Run a single example:

```bash
make example E=document/get_document.php
```

Run all examples:

```bash
make examples
```

Or call the script directly:

```bash
examples/_bin/run document/get_document.php
examples/_bin/run all
```

## Configuration

Configuration values follow the naming convention `{domainName}_{variableName}`:
Global values are an exception and omit `{domainName}`.

| Key | Description |
|---|---|
| `bearer_token` | Your signNow API bearer token (optional — auth via `.env` is used by default) |
| `path_to_document` | Path to a PDF file for upload examples |
| `document_id` | Existing document ID |
| `bulk_invite_template_id` | Template ID for bulk invite |
| `document_group_recipients_document_group_id` | Document group ID for recipients example |
| ... | See `signnow-example-config.php.example` for the full list |
