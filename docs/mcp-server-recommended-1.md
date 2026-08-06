<<<<<<< HEAD
---
<<<<<<< HEAD
<<<<<<< HEAD
title: "MCP Server Consigliati per il Modulo Media"
module: "Media"
type: concept
tags: [mcp, server, recommended, 1]
created: 2026-07-14
updated: 2026-07-14
qmd: "mcp server recommended 1"
related:
  - "./webm.md"
---
# MCP Server Consigliati per il Modulo Media
=======
=======
>>>>>>> 766d652 (.)
module: theme
topic: mcp-server-recommended-1
canonical: ../../../Themes/docs/shared-components/mcp-server-recommended-1.md
---
<<<<<<< HEAD
>>>>>>> 33a3006 (.)
=======
>>>>>>> 766d652 (.)

See canonical documentation: ../../../Themes/docs/shared-components/mcp-server-recommended-1.md
=======
# MCP Server Consigliati per il Modulo Media

## Scopo del Modulo
Gestione media, upload, conversioni e streaming.

## Server MCP Consigliati
- `filesystem`: Per gestione file media, upload e conversioni.
- `fetch`: Per recupero o invio media a servizi esterni.
- `memory`: Per caching temporaneo durante le operazioni di conversione.

## Configurazione Minima Esempio
```json
{
  "mcpServers": {
    "filesystem": { "command": "npx", "args": ["-y", "@modelcontextprotocol/server-filesystem"] },
    "fetch": { "command": "npx", "args": ["-y", "@modelcontextprotocol/server-fetch"] },
    "memory": { "command": "npx", "args": ["-y", "@modelcontextprotocol/server-memory"] }
  }
}
```

## Note
- Personalizza la configurazione per esigenze di streaming o CDN.
>>>>>>> 7605234 (.)
