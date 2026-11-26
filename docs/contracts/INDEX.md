# Media behavioral contract index

This is the machine-readable inventory of behavioral contracts owned by the **Media** module.

A contract describes an existing public operation or boundary. It names the owner, input, output, stable invariants, side effects and their order, errors, and non-goals. Every invariant gets a stable ID and a Pest group when a test exists; missing coverage is recorded as debt instead of being implied away.

## Contracts

- [attach-media-action](attach-media-action.md)
- [base-s3-action](base-s3-action.md)
- [build-config-debug-data-action](build-config-debug-data-action.md)
- [check-bucket-policy-action](check-bucket-policy-action.md)
- [check-file-exists-action](check-file-exists-action.md)
- [convert-srt-to-vtt-action](convert-srt-to-vtt-action.md)
- [convert-video-action](convert-video-action.md)
- [convert-video-by-convert-data-action](convert-video-by-convert-data-action.md)
- [convert-video-by-media-convert-action](convert-video-by-media-convert-action.md)
- [create-filesystem-s3-client-action](create-filesystem-s3-client-action.md)
- [create-filesystem-sts-client-action](create-filesystem-sts-client-action.md)
- [delete-file-action](delete-file-action.md)
- [extract-subtitle-plain-text-action](extract-subtitle-plain-text-action.md)
- [format-debug-output-action](format-debug-output-action.md)
- [generate-temporary-upload-path-action](generate-temporary-upload-path-action.md)
- [get-attachments-schema-action](get-attachments-schema-action.md)
- [get-aws-config-snapshot-action](get-aws-config-snapshot-action.md)
- [get-aws-s3-error-solution-action](get-aws-s3-error-solution-action.md)
- [get-cloud-front-signed-url-action](get-cloud-front-signed-url-action.md)
- [get-effective-upload-limit-action](get-effective-upload-limit-action.md)
- [get-file-info-action](get-file-info-action.md)
- [get-filesystem-adapter-action](get-filesystem-adapter-action.md)
- [get-media-exporter-action](get-media-exporter-action.md)
- [get-temporary-upload-conversion-path-action](get-temporary-upload-conversion-path-action.md)
- [get-temporary-upload-path-action](get-temporary-upload-path-action.md)
- [get-temporary-upload-responsive-path-action](get-temporary-upload-responsive-path-action.md)
- [get-video-duration-action](get-video-duration-action.md)
- [get-video-frame-content-action](get-video-frame-content-action.md)
- [get-video-screenshot-action](get-video-screenshot-action.md)
- [merge](merge.md)
- [parse-subtitle-xml-action](parse-subtitle-xml-action.md)
- [path-generator](path-generator.md)
- [run-full-aws-diagnostic-action](run-full-aws-diagnostic-action.md)
- [run-s3-save-test-action](run-s3-save-test-action.md)
- [save-attachments-action](save-attachments-action.md)
- [stream-video-action](stream-video-action.md)
- [strip-image-metadata-action](strip-image-metadata-action.md)
- [svg-exists-action](svg-exists-action.md)
- [test-bucket-permissions-action](test-bucket-permissions-action.md)
- [test-cloud-front-config-action](test-cloud-front-config-action.md)
- [test-cloud-front-connection-action](test-cloud-front-connection-action.md)
- [test-cloud-front-signed-urls-action](test-cloud-front-signed-urls-action.md)
- [test-connection-details-action](test-connection-details-action.md)
- [test-credentials-action](test-credentials-action.md)
- [test-file-upload-download-action](test-file-upload-download-action.md)
- [test-iam-credentials-action](test-iam-credentials-action.md)
- [test-iam-policies-action](test-iam-policies-action.md)
- [test-s3-connection-action](test-s3-connection-action.md)
- [test-s3-file-operations-action](test-s3-file-operations-action.md)
- [test-s3-permissions-action](test-s3-permissions-action.md)
- [update-model-subtitle-field-action](update-model-subtitle-field-action.md)
- [upload-file-action](upload-file-action.md)

Copertura e backlog: [README.md](README.md).

## Authoring

Use [Xot contract authoring standard](../../../Xot/docs/contracts/contract-authoring-standard.md) and the shared template. Legacy behavior is documented as-is and is not a model for new code.
