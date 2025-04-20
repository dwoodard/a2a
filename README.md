# dwoodard/a2a

A Laravel package for Google's Agent-to-Agent (A2A) protocol integration.

## Installation

```bash
composer require dwoodard/a2a
```

## Configuration

Publish the config file:

```bash
php artisan vendor:publish --provider="Dwoodard\\A2A\\LaravelAgentServiceProvider" --tag=a2a-config
```

Set your A2A token and agent metadata in `config/a2a.php` or your `.env` file.

## Endpoints

- `GET /.well-known/agent.json` — Agent metadata
- `POST /a2a/handle` — JSON-RPC 2.0 task handler
- `GET /a2a/stream/{taskId}` — (Optional) SSE stream endpoint

## Built-in Handlers

- `sendEmail`: Send emails via Laravel Mail
- `queryDatabase`: Execute simple database queries
- `dispatchJob`: Dispatch Laravel jobs
- `notify`: Send Laravel notifications

## Usage Example

**Send an email:**

```json
{
  "jsonrpc": "2.0",
  "method": "sendEmail",
  "params": {
    "to": "user@example.com",
    "subject": "Hello",
    "body": "Message body"
  },
  "id": 1
}
```

**Query the database:**

```json
{
  "jsonrpc": "2.0",
  "method": "queryDatabase",
  "params": {
    "query": "SELECT * FROM users WHERE id = ?",
    "bindings": [1]
  },
  "id": 2
}
```

## Custom Handlers

Implement `Dwoodard\A2A\Contracts\TaskHandler` and register your handler in the `capabilities` array in `config/a2a.php`.

## Security Best Practices

- Always set a strong `A2A_TOKEN` in your `.env` file.
- Restrict access to endpoints using the provided middleware.
- Never expose sensitive data in handler responses.

## Deployment Considerations

- Use environment variables for all secrets.
- Review and restrict CORS and firewall settings as needed.

## Testing

This package is designed for Pest. Add your tests in the `tests/` directory.

## License

MIT
